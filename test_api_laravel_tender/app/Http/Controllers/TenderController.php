<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Tender;
use App\Domain\Invite;
use App\Domain\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TenderController extends Controller
{
    /**
     * Create a new tender with specific details and invited suppliers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTender(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'visibility' => 'required|in:Public,Private',
            'invited_suppliers' => 'nullable|array',
            'invited_suppliers.*' => 'email', 
        ]);
    
        $tender = Tender::create([
            'title' => $request->title,
            'description' => $request->description,
            'visibility' => $request->visibility,
            'creator_id' => Auth::id(),
        ]);
    
        if ($request->visibility == 'Private' && !empty($request->invited_suppliers)) {
            
            $suppliers = User::whereIn('email', $request->invited_suppliers)->pluck('id');
                        
            foreach ($suppliers as $supplierId) {
                Invite::create([
                    'tender_id' => $tender->id,
                    'supplier_id' => $supplierId,
                ]);
            }
        }
    
        return response()->json(['message' => 'Tender created successfully!']);
    }

    public function destroy($id)
    {
        $tender = Tender::find($id);
        if (!$tender) {
            return response()->json(['message' => 'Tender not found.'], 404);
        }
        if ($tender->creator_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized to delete this tender.'], 403);
        }

        $tender->delete();

        return response()->json(['message' => 'Tender deleted successfully!']);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'visibility' => 'sometimes|required|in:Public,Private',
        ]);

        $tender = Tender::find($id);

        if (!$tender) {
            return response()->json(['message' => 'Tender not found.'], 404);
        }

        if ($tender->creator_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized to update this tender.'], 403);
        }

        $tender->update($request->only(['title', 'description', 'visibility']));

        return response()->json(['message' => 'Tender updated successfully!', 'tender' => $tender]);
    }
    public function show($id)
    {
        $tender = Tender::find($id);
        if (!$tender) {
            return response()->json(['message' => 'Tender not found.'], 404);
        }
        return response()->json(['tender' => $tender]);
    }

    public function myTenders()
    {
        $tenders = Tender::where('creator_id', Auth::id())->get();
    
        return response()->json(['tenders' => $tenders]);
    }

    public function mySuppliers()
    {
        $supplierId = Auth::id();
    
        $tenders = Tender::where(function ($query) use ($supplierId) {
            $query->where('visibility', 'Public')
                  ->orWhere(function ($query) use ($supplierId) {
                      $query->where('visibility', 'Private')
                            ->whereHas('invites', function ($query) use ($supplierId) {
                                $query->where('supplier_id', $supplierId);
                            });
                  });
        })->get();
    
        return response()->json(['tenders' => $tenders]);
    }
    
    
    

}