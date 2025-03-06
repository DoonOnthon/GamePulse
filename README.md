# GamePulse 🎮🚀
</br>
**NOT AS ACTIVE CODING MYSELF, I WILL TRY TO CHECK UP ON PULL REQUESTS AS MUCH AS TIME ALLOWS ME**</br>
**I'M VERY BUSY ATM.**

# Welcome
I hope to see some of you guys return and new contributors are always welcome!
Welcome to GamePulse, your go-to platform for discovering, exploring, and engaging with a curated collection of games! Whether you're an avid gamer or a casual player, GamePulse offers a user-friendly experience to help you stay connected with the pulse of gaming excitement. Let the gaming adventure begin! 💻🎉

⭐ **Star this repository** (top right) so that you can keep up to date with recent contribution activity via your GitHub feed.

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Short-Term Goals](#short-term-goals)
- [Long-Term Goals](#long-term-goals)
- [Setting Up the Project](#setting-up-the-project)
  - [Environment Variables (`.env`)](#environment-variables-env)
  - [Database Setup & Migrations](#database-setup--migrations)
- [Contributing](#contributing)
- [Our Contributors](#our-contributors)
- [License](#license)

## Introduction

GamePulse is a web-based application that aims to provide gamers with an organized and comprehensive platform to discover and explore games based on various criteria such as categories, release dates, and sales numbers. Our goal is to create an inclusive community of gaming enthusiasts who can engage with their favorite games and share their experiences.

## Features

- **Game Categories**: Easily browse through games sorted by genres and categories, including action, adventure, RPG, puzzle, simulation, and more.
- **Release Date Sorting**: Stay up-to-date with the latest game releases or explore classic titles by sorting games based on their release dates.
- **Sales Numbers**: Get insights into the popularity of games with approximate sales numbers as of a specific date.
- **User-Friendly Interface**: The intuitive and user-friendly interface makes it simple to navigate and find your favorite games.
- **Search Functionality**: Quickly find specific games using the search bar.
- **Game Details**: Each game comes with detailed information, including descriptions, gameplay features, trailers, and user reviews.
- **Community Interaction**: Engage with fellow gamers through discussions, recommendations, and game reviews.

## Short-Term Goals

Our short-term goals for GamePulse include:
- Creating a simple list of games with essential details, such as categories, release dates, and sales numbers.
- Implementing a search functionality to enable users to find specific games easily.
- Designing an intuitive user interface for seamless navigation and discovery.
- Setting up basic community interaction features for users to share their thoughts on games.

## Long-Term Goals

Our long-term goals for GamePulse include:
- Introducing user accounts, enabling users to create profiles and save their favorite games.
- Implementing a user review system to gather valuable feedback and ratings for games.
- Expanding the game database to include a wider range of titles from different platforms and genres.
- Enhancing the community features, such as forums and social sharing, to foster a vibrant and active user community.
- Introducing multilingual support to make GamePulse accessible to users from various regions.

## Setting Up the Project

### Environment Variables (`.env`)

GamePulse uses an `.env` file to store sensitive information like database credentials. To set it up:

1. Copy the example environment file:
   ```
   cp .env.example .env
   ```
2. Open .env in a text editor and update the necessary values, such as database credentials:

 ```
   DB_HOST=127.0.0.1
   DB_NAME=gamepulse
   DB_USER=root
   DB_PASS=yourpassword
```
   The config/env.php file will automatically load these environment variables into your project.

   Note: Do not commit your .env file to Git! It is ignored in .gitignore to keep sensitive data private.

### Database Setup & Migrations

#### Setting Up the Database
Make sure you have MySQL installed and running. Then:

1. Create the database:
```
   CREATE DATABASE gamepulse;
```
2. Ensure your .env file has the correct database credentials.

#### Running Migrations
To set up the database structure, we use SQL migration files in the /migrations/ folder.

1. Apply all migrations:

   php scripts/migrate.php

2. If needed, you can apply a specific migration manually:
```
   mysql -u root -p gamepulse < migrations/001_create_users_table.sql
```
3. If you make schema changes, create a new SQL migration file in /migrations/ and follow the existing naming convention (001_create_users_table.sql, 002_add_games_table.sql, etc.).

## Contributing

We really appreciate any contribution from the gaming community, and we warmly welcome everyone, including beginners. Whether you're an experienced developer or just starting your coding journey, there are various ways you can contribute to our project. If you can't code, don't worry; you can still make valuable contributions, such as fixing typos, adding comments to code, or suggesting new features. Your involvement helps make GamePulse a thriving hub for gaming enthusiasts.

To contribute, please follow these steps:

1. Fork the repository to your GitHub account.
2. Create a new branch with a descriptive name related to your contribution.
3. Make your changes and improvements.
4. Test your changes thoroughly to ensure they don't introduce any new issues.
5. Commit your changes with clear and concise commit messages.
6. Push your changes to your branch in your forked repository.
7. Create a pull request to the main branch of the GamePulse repository.

For more details, please refer to our [contribution guidelines](CONTRIBUTING.md).

## Our Contributors
Contribute to get on the list!

<table>
  <tbody>
    <tr>
      <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/DoonOnthon">
          <img src="https://github.com/DoonOnthon.png" width="100px;" alt="DoonOnthon"/><br />
          <sub><b>DoonOnthon</b></sub>
        </a>
        <br />
        <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/harrydemorgan">
          <img src="https://github.com/harrydemorgan.png" width="100px;" alt="harrydemorgan"/><br />
          <sub><b>harrydemorgan</b></sub>
        </a>
        <br />
      </td>
      <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/doromi22">
          <img src="https://github.com/doromi22.png" width="100px;" alt="doromi22"/><br />
          <sub><b>doromi22</b></sub>
        </a>
        <br />
      </td>
            <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/AlexWolak">
          <img src="https://github.com/AlexWolak.png" width="100px;" alt="AlexWolak"/><br />
          <sub><b>AlexWolak</b></sub>
        </a>
        <br />
      </td>
            <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/tetawiah">
          <img src="https://github.com/tetawiah.png" width="100px;" alt="tetawiah"/><br />
          <sub><b>tetawiah</b></sub>
        </a>
        <br />
      </td>
        <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/AlandisAyupov">
          <img src="https://github.com/AlandisAyupov.png" width="100px;" alt="AlandisAyupov"/><br />
          <sub><b>AlandisAyupov</b></sub>
        </a>
        <br />
      </td>
       <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/IamSudhir-Kumar">
          <img src="https://github.com/IamSudhir-Kumar.png" width="100px;" alt="AlandisAyupov"/><br />
          <sub><b>IamSudhir-Kumar</b></sub>
        </a>
        <br />
      </td>
      <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/Omanshu209">
          <img src="https://github.com/Omanshu209.png" width="100px;" alt="Omanshu209"/><br />
          <sub><b>Omanshu209</b></sub>
        </a>
        <br />
      </td>
      <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/Legen32">
          <img src="https://github.com/Legen32.png" width="100px;" alt="Legen32"/><br />
          <sub><b>Legen32</b></sub>
        </a>
        <br />
      </td>
      <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/LilMaddy">
          <img src="https://github.com/LilMaddy.png" width="100px;" alt="LilMaddy"/><br />
          <sub><b>LilMaddy</b></sub>
        </a>
        <br />
      </td>
      <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/dalek63">
          <img src="https://github.com/dalek63.png" width="100px;" alt="dalek63"/><br />
          <sub><b>dalek63</b></sub>
        </a>
        <br />
      </td>
            <td align="center" valign="top" width="14.28%">
        <a href="https://github.com/andre-franciosi">
          <img src="https://github.com/andre-franciosi.png" width="100px;" alt="andre-franciosi"/><br />
          <sub><b>andre-franciosi</b></sub>
        </a>
        <br />
      </td>
      <!-- Add more <td> elements for other contributors if needed -->
    </tr>
    <!-- Add more <tr> elements for additional rows if needed -->
  </tbody>
</table>
**Note:** After  contributing, if you wish to be featured on the GitHub README as a contributor, please add yourself to the list in the following format:
```
<td align="center" valign="top" width="14.28%">
  <a href="https://github.com/YourGithubName">
    <img src="https://github.com/YourGithubName.png" width="100px;" alt="YourGithubName"/><br />
    <sub><b>YourGithubName</b></sub>
  </a>
  <br />
</td>
```
Replace YourGithubName in both the URL (https://github.com/YourGithubName) and image (https://github.com/YourGithubName.png) with your GitHub username. This ensures your inclusion as a contributor on our GitHub README. Thank you for your contributions to GamePulse! 🎮🚀
  
We appreciate the contributions of all developers who have helped make GamePulse a reality. If you're interested in contributing to this project, feel free to explore our [Contribution Guidelines](CONTRIBUTING.md) to get started.

## Our Contributors
Contribute to get on the list!

<!-- Contributors section omitted for brevity -->

## License
GamePulse is released under the MIT License. Feel free to use, modify, and distribute the project in accordance with the terms specified in the license.

Join us on this exciting journey as we build a comprehensive gaming platform that fuels your passion for gaming and brings the gaming community together. Let's pulse with the heartbeat of gaming! 🎮🚀

#hashtags #goodfirstissue #beginnerfriendly #gaming #indiegames #gamersunite #gamecommunity

### **What’s New in This Version?**
✅ **Added `.env` setup** section  
✅ **Explained how to configure MySQL credentials**  
✅ **Detailed database migration steps**  
✅ **Included command-line instructions for setting up the project**

