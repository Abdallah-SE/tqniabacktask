# Backend Stack Task

## Introduction
This project aims to create a musical app that serves as a platform for artists and musical venues to connect and discover new music shows. The goal is to build a fully functioning site with various functionalities, allowing users to create venues, artists, shows, and search for venues and artists.

## Prerequisites
- Knowledge of PHP and Laravel framework
- Familiarity with RESTful API development
- Experience working with databases, preferably PostgreSQL or MySQL

## Getting Started
To get started with the project, follow these steps:

1. Clone the repository.
2. Install the required dependencies.
3. Set up the database connection.
4. Run the migrations to create the necessary database tables.
5. Start the development server.

## Notes
- This project focuses on the backend implementation and assumes that the frontend and user interface components are already in place.
- The backend is built using PHP and the Laravel framework, which provides a robust foundation for RESTful API development.
- The database can be either PostgreSQL or MySQL, depending on your preference and requirements.

## Assumptions 
- The goal is to create a platform where artists and venues can find each other and discover new music shows.
- The project aims to implement essential functionalities such as creating new venues, artists, and shows, as well as searching for venues and artists.
- Additionally, users should be able to learn more about a specific artist or venue.

## Tech Stacks
- Backend: PHP, Laravel, RESTful API
- Database: PostgreSQL or MySQL

## Working Functionalities
The project includes the following working functionalities:

- Creating new venues, artists, and shows.
- Searching for venues and artists.
- Providing detailed information about a specific artist or venue.

Let's collaborate and make the musical app the next big platform for artists and musical venues to connect and discover amazing music shows!

## Testing the API using Postman
To test the API endpoints, you can use a tool like Postman. Follow the steps below to test the API:

1. Open Postman and create a new request.
2. Set the request method (GET, POST) and enter the API endpoint URL.
3. Add the required headers, such as 'Content-Type'  .
4. If the request requires a request body, select the appropriate type ( JSON) and enter the request payload.
5. Click the 'Send' button to make the request and view the response.

## Using Postman Endpoints And Variables 
To use the endpoint will make url variable in postman called url add the url of application
http://127.0.0.1:8000/api/v1/

1. create new artist the body request contain (name, bio, image) {{url}}artists
2. detailed information about artist  {{url}}artists/{artist}
3. create new venue the body request contain (name, location, capacity) {{url}}venues
4. detailed information about venue using endpint {{url}}venues/{venue}
5. create new show the body request contain (artist_id, venue_id, title, description, date){{url}}shows  
6. searching for venues and artists with param query  using endpint  {{url}}search?query=venue