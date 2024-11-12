I. Project Setup Guide
Prerequisites
	•	Docker and Docker Compose installed on your machine.
	•	Git for cloning the repository.
  1.	Clone the Project:
   git clone https://github.com/Danny2725/React_js_tender_and_BE_laravel/tree/main
   cd test_api_laravel_tender
  2.	Start the Docker Containers:
	•	docker-compose up -d
	•	You can access the application at http://localhost (or another port if configured differently in docker-compose.yml).
  3.    Run Laravel Migrations:
   	•	Once the containers have started, run the Laravel container migration command to create the tables in the database:
    docker exec -it <containerId> bash
    php artisan migrate
  4.	Stopping the Containers:
	•	When you’re done, stop the containers with:
    docker-compose down
 II. Curl

  1. Auth: 
- Register
```
curl --location 'http://localhost/api/auth/register' \
--header 'Accept: application/json, text/plain, */*' \
--header 'Accept-Language: en-US,en;q=0.9,vi-VN;q=0.8,vi;q=0.7,fr-FR;q=0.6,fr;q=0.5' \
--header 'Content-Type: application/json' \
--header 'Sec-Fetch-Dest: empty' \
--header 'Sec-Fetch-Mode: cors' \
--header 'Cookie: i18n_redirected=en' \
--data-raw '{"name":"emxampe","email":"example@gmail.com","password":"example123","role":"contractor"}'
```
- Login
```
curl --location 'http://localhost/api/auth/login' \
--header 'Accept: application/json, text/plain, */*' \
--header 'Content-Type: application/json' \
--header 'Sec-Fetch-Mode: cors' \
--data-raw '{"email":"example@gmail.com","password":"example123"}'
````

2. Create Tender
```
curl --location 'http://localhost/api/tender' \
--header 'Accept: application/json, text/plain, */*' \
--header 'Authorization: Bearer 21|90mMFXIMko8DVaER9hvjjpRbyvxUc9ABmwG85h3202a2fb83' \
--header 'Connection: keep-alive' \
--header 'Content-Type: application/json' \
--header 'Sec-Fetch-Mode: cors' \
--header 'Sec-Fetch-Site: same-site' \
--data-raw '{"title":"exmaple","description":"example","visibility":"Public","invited_suppliers":["example999@gmail.com"]}'
```
3. get list contructor
```
curl --location 'http://localhost/api/tender' \
--header 'Accept: application/json, text/plain, */*' \
--header 'Authorization: Bearer 21|90mMFXIMko8DVaER9hvjjpRbyvxUc9ABmwG85h3202a2fb83' \
--header 'Sec-Fetch-Mode: cors' \
```
4. Edit tender
```
curl --location --request PUT 'http://localhost/api/tender/24' \
--header 'Accept: application/json, text/plain, */*' \
--header 'Authorization: Bearer 21|90mMFXIMko8DVaER9hvjjpRbyvxUc9ABmwG85h3202a2fb83' \
--header 'Content-Type: application/json' \
--header 'Sec-Fetch-Mode: cors' \
--data '{"title":"exmaple43355","description":"example","visibility":"Public"}'
```
5. Delete tender
```
curl --location --request DELETE 'http://localhost/api/tender/24' \
--header 'Authorization: Bearer 21|90mMFXIMko8DVaER9hvjjpRbyvxUc9ABmwG85h3202a2fb83' \
--header 'Sec-Fetch-Mode: cors' \
```
6. get list supplier
```
curl --location 'http://localhost/api/tender/sup' \
--header 'Authorization: Bearer 21|90mMFXIMko8DVaER9hvjjpRbyvxUc9ABmwG85h3202a2fb83' \
--header 'Sec-Fetch-Mode: cors' \
```
7. get supplier detail
```
|curl 'http://localhost/tender/view/9' \
  -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7' \
  -H 'Accept-Language: en-US,en;q=0.9,vi;q=0.8' \
  -H 'Cache-Control: no-cache' \
  -H 'Connection: keep-alive' \
  -H 'Cookie: token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsb2NhbGhvc3QiLCJhdWQiOiJsb2NhbGhvc3QiLCJpYXQiOjE3MzEyNTE2OTIsImV4cCI6MTczMTI1NTI5MiwiZGF0YSI6eyJpZCI6IjEiLCJlbWFpbCI6InRlc3RpbmcxQGdtYWlsLmNvbSIsInJvbGUiOiJjb250cmFjdG9yIn19.B4aj3gbktq-EMqKqKefFtjwnAxVhu9CFRJck9-2dRO4; ci_session=b3f5f52b469dfcb628657e415026692849b8653c' \
  -H 'Pragma: no-cache' \
  -H 'Referer: http://localhost/tender/list_supplier' \
  -H 'Sec-Fetch-Dest: document' \
  -H 'Sec-Fetch-Mode: navigate' \
  -H 'Sec-Fetch-Site: same-origin' \
  -H 'Sec-Fetch-User: ?1' \
  -H 'Upgrade-Insecure-Requests: 1' \
  -H 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36' \
  -H 'sec-ch-ua: "Chromium";v="130", "Google Chrome";v="130", "Not?A_Brand";v="99"' \
  -H 'sec-ch-ua-mobile: ?0' \
  -H 'sec-ch-ua-platform: "macOS"'
```

III> Migration

1. users table
```
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Contractor','Supplier') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
```

2. Tender table
```
DROP TABLE IF EXISTS `tenders`;
CREATE TABLE `tenders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` enum('Public','Private') COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tenders_creator_id_foreign` (`creator_id`),
  CONSTRAINT `tenders_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

3. invents table

```
DROP TABLE IF EXISTS `invites`;
CREATE TABLE `invites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tender_id` bigint unsigned NOT NULL,
  `supplier_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invites_tender_id_foreign` (`tender_id`),
  KEY `invites_supplier_id_foreign` (`supplier_id`),
  CONSTRAINT `invites_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `invites_tender_id_foreign` FOREIGN KEY (`tender_id`) REFERENCES `tenders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

Why Laravel is suitable for this tender management project:

1.	Built-in Authentication & Authorization
Laravel provides robust authentication out of the box
Role-based access control is easier to implement using Laravel's Gate and Policy features
Perfect for your contractor/supplier role requirements

2.	Eloquent ORM
Makes database operations more intuitive and secure
Relationships between tenders and users can be easily defined
Built-in query builder for complex tender filtering

3.	Modern Architecture
MVC pattern implementation is more robust than CodeIgniter
Service container for better dependency injection
Event/listener system for handling tender notifications
4.	API Development 
Built-in API authentication using Laravel Sanctum/Passport
API resource classes for consistent response formatting
API rate limiting and throttling built-in




## Comparison: CodeIgniter vs Laravel

| Feature               | CodeIgniter                          | Laravel                                      |
|-----------------------|--------------------------------------|----------------------------------------------|
| **Complexity**        | Simple, easy to learn                | More complex, with many built-in features    |
| **Performance**       | Fast, lightweight, few dependencies  | Slightly heavier but ideal for larger apps   |
| **Routing**           | Basic                                | Advanced, supports RESTful and middleware    |
| **ORM**               | Basic Active Record                  | Powerful Eloquent ORM                        |
| **Built-In Features** | Requires additional setup for extras | Includes authentication, authorization, caching |
| **Testing**           | Limited testing support              | Comprehensive testing tools                  |
| **Community**         | Smaller, fewer resources available   | Large, active community, extensive resources |

## Areas of Potential Improvement

### 1. Performance Optimization
- Implement caching system for frequently accessed tender data
- Optimize database queries for large datasets
- Add pagination for tender listings
- Implement lazy loading for related data
- Consider using Redis for caching and session management

### 2. Security Enhancements
- Implement two-factor authentication for sensitive operations
- Add rate limiting for API endpoints
- Enhance password policies
- Implement IP-based access restrictions
- Add audit logging for critical actions

### 3. User Experience
- Add real-time notifications using WebSockets
- Implement email notifications for tender updates
- Enhance search functionality with filters
- Add export functionality for tender data (PDF, Excel)
- Implement document preview system

### 4. Code Quality
- Increase unit test coverage
- Implement integration tests
- Add API documentation using OpenAPI/Swagger
- Enhance error handling and logging
- Implement continuous integration/deployment (CI/CD)

### 5. Feature Additions
- Advanced reporting and analytics dashboard
- Tender document version control
- Bulk operations for tender management
- Integration with external payment systems
- Mobile-responsive API endpoints

### 6. Scalability
- Implement horizontal scaling capabilities
- Add load balancing configuration
- Optimize file storage system
- Implement queue system for heavy processes
- Database sharding for large datasets

### 7. Monitoring and Maintenance
- Add system health monitoring
- Implement automated backup systems
- Add performance monitoring tools
- Create maintenance mode functionality
- Implement error tracking system

### 8. Documentation
- Enhance API documentation
- Add code documentation
- Create user guides
- Document deployment processes
- Add system architecture diagrams

### 9. Integration Capabilities
- Add support for third-party integrations
- Implement webhook system
- Create public API for external systems
- Add SSO capabilities
- Enable integration with common procurement systems