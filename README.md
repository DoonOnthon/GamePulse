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
   ```sh
   cp .env.example .env
2. Open .env in a text editor and update the necessary values, such as database credentials:

   DB_HOST=127.0.0.1
   DB_NAME=gamepulse
   DB_USER=root
   DB_PASS=yourpassword

   The config/env.php file will automatically load these environment variables into your project.

   Note: Do not commit your .env file to Git! It is ignored in .gitignore to keep sensitive data private.

### Database Setup & Migrations

#### Setting Up the Database
Make sure you have MySQL installed and running. Then:

1. Create the database:

   CREATE DATABASE gamepulse;

2. Ensure your .env file has the correct database credentials.

#### Running Migrations
To set up the database structure, we use SQL migration files in the /migrations/ folder.

1. Apply all migrations:

   php scripts/migrate.php

2. If needed, you can apply a specific migration manually:

   mysql -u root -p gamepulse < migrations/001_create_users_table.sql

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

For more details, please refer to our contribution guidelines.

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
