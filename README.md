<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/github_username/repo_name">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Project Management</h3>

  <p align="center">
    is project management system help you to manage your company.
    <br />
    <a href="https://github.com/github_username/repo_name"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/shawkiIIalasy/project-management">View Demo</a>
    ·
    <a href="https://github.com/shawkiIIalasy/project-management/issues">Report Bug</a>
    ·
    <a href="https://github.com/shawkiIIalasy/project-management/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

<img src="/public/images/manager-dashboard.png" alt="Logo">

is project management system help you to manage your company.



### Built With
This project built by REST-based APIs

** Back End 
* [PHP Laravel 8]()

** Front End
* [Vue3 Js]()
* [Html]()
* [Css]()



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.


Project Users type: 
* Manager 
* Employee 

### Manager 
<img src="/public/images/manager-dashboard.png" alt="Logo">
    1- Login and Register
        Manager can navigate `/register` and filling the user first name and last name and password and Access code 
        * you can use `MAN_123456` as Manager Access code each access code will be valid for only one time.
        * Managers can't register without access code.
        
        Manager can navigate `/login` and login by the user credentials

    2- Responsibility

        Managers are responsible on [Create, Update, Delete, List] Employee, Departments, and Projects
        Managers are responsible on assign or unassign users to Projects.


### Employee
<img src="/public/images/employee-dashboard.png" alt="Logo">
    1- Login and Register

    Employees can navigate `/register` also and filling the user first name and last name and password and Access code
            * Access code for employee will directly assign the user to the department.
            * Employees can't register without access code.

    Employees can navigate `/login` and login by the user credentials

    2- Responsibility

    Employees are responsible on viewing Projects


### Collision: 

Access code on register form
 1. can be an auto generate code when the department created to allow employees to register accessed department.
 2. also can be an manager access code to allow manager to register to platform.


### Prerequisites

* Apache Server
* PHP 7 or later
* Mysql 8 or later
* Composer manager

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/shawkiIIalasy/project-management.git
   ```
2. Copy Example environment file
   ```sh
   cp .env.example .env
   ```
3. Run Composer install
    ```sh
    composer install
    ```
4. Run Key generate command
    ```sh
    php artisan key:generate    
    ```
5. Add you Database Credential to `.env file`
    ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database
    DB_USERNAME=root
    DB_PASSWORD=
    ```
6. Run Migrations to generate Database schema
    ```sh
    php artisan migrate
    ```
7. Defined your APP domains (this variable needs to defined Access control domains to you back end point)
    ```sh
    APP_DOMAINS=your project domains
    ```
   * should be a sting with comma separator after each domain
8. [OneTime] Run DB seeder to insert the initialize `manage access code`
   ```
    php artisan db:seed
   ```
9. Enjoy



<!-- USAGE EXAMPLES -->
## Usage

Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.

_For more examples, please refer to the [Documentation](https://example.com)_



<!-- ROADMAP -->
## Roadmap

1- Add privileges and permissions roles to generate custom user role type
2- etc ...


<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Shawki Alasy - [@shawki-alasy-62485a15a](https://www.linkedin.com/in/shawki-alasy-62485a15a/) - shawki.alasy5@gmail.com

Project Link: [https://github.com/shawkiIIalasy/project-management](https://github.com/shawkiIIalasy/project-management)
