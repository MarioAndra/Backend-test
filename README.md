   # BackEndTest

   ## Setup Instructions
   1. Clone the repo: `git clone [https://github.com/MarioAndra/Backend-test.git]`
   2. Install dependencies: `composer install`
   3. Copy `.env.example` to `.env`: `cp .env.example .env`
   4. Generate app key: `php artisan key:generate`
   5. Configure database in `.env`:
      DB_DATABASE=backend-test
      DB_USERNAME=root


   6. Get AbstractAPI key:  
      - Sign up at [AbstractAPI](https://www.abstractapi.com/phone-validation-api).  
      - Add to `.env`: `ABSTRACT_API_KEY=6fcc0bf99c5947ec85f26a2e08b24375`  
   7. Migrate & seed (if needed): `php artisan migrate --seed`  
   8. Start server: `php artisan serve`  

   ## API Documentation

   ### Authentication
   - **Register:**  
     `POST /api/users/auth/register`  
     Body: `name`, `email`, `password`  

   - **Login:**  
     `POST /api/users/auth/login`  
     Body: `email`, `password`  
     Returns: `Bearer Token`  

   - **Protected Routes:** Include header:  
     `Authorization: Bearer {token}`  

   ### Company Management (Protected)
   - **List Companies:** `GET /api/companies`  
   - **Get Company:** `GET /api/companies/{id}`  
   - **Create Company:** `POST /api/companies`  
     Body: `name`, `email`, `phone`, `country_id`, `industry`  
     (Phone validated via AbstractAPI)  

   - **Update Company:** `PUT /api/companies/{id}`  
   - **Delete Company:** `DELETE /api/companies/{id}`  

    ### Country (Protected)
   - **List countries:** `GET /api/countries` 

   ### Inquiries (Frontend)
   - Access `/login`or `/register` to authenticate.  
   - Submit inquiries at `/inquiries` with a company selection.  

   ## Running Tests
   Execute: `php artisan test`  
   Tests cover:
   - User registration (valid/invalid data)
   - Login & token generation
   - Protected route access

   ## To Test Phone validated via AbstractAPI in case (Failure)
   Login using this account :
    phone=0999999999
    password=password

   ## Postman Collection 
   Import `BackEnd-Test.postman_collection.json` (attached) for endpoint testing.

   ## URL Collection 
   https://documenter.getpostman.com/view/30811084/2sB2cPk6B1
   

      
