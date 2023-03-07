*Subscription API*:
This API allows users to subscribe to websites and receive notifications about new posts on those websites.

**API Endpoints**:
Base URL: `http://localhost:8080/api/`
***Create Post***: `POST /websites/{websiteId}/posts`

Creates a new post for the website with the given ID.

Request Parameters:
- `websiteId`: required - The ID of the website to create the post for.

Request Body:
- `title`: required - The title of the post.
- `description`: required - The description of the post.

Response:
- `201`: The post was created successfully.
- `404`: The website with the given ID was not found.

***Subscribe to Website***: `POST /websites/{websiteId}/subscription`

Subscribes the user to the website with the given ID.

Request Parameters:
- `websiteId`: required - The ID of the website to subscribe to.

Request Body:
- `name`: required - The name of the user to subscribe to the website with.
- `email`: required - The email address to subscribe to the website with.

Response:
- `201`: The user was subscribed to the website successfully.
- `404`: The website with the given ID was not found.
- `409`: The user is already subscribed to the website.


**Installation**:
1. Clone the repository.
2. Install dependencies: `composer install`
3. Configure the database connection in `.env` file.
4. Run migrations: `php artisan migrate`
5. Start the server: `php artisan serve`

**Technologies Used**:
- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)
- [MySQL](https://www.mysql.com/)

**Future Improvements**:
- Add authentication to the API.
- Add a frontend to the API.

**License**:
This project is licensed under the MIT License - see the LICENSE.md file for details
