

## Overview

This quiz system allows users to participate in quizzes, view their results, and compete on leaderboards.

## Features

#### Admin Features

- Manage Other Admins: Admins can create, update, or remove other admin accounts.
- Manage Quizzes: Create, update, or delete quizzes with multiple-choice or true/false questions
-  Manage Questions and Options: Add, edit, or remove questions and possible answers for each quiz.
-  View Test Results: View detailed reports of all quizzes taken on the platform, including user scores and performance trends.

#### User Features
- Log In and Register: Users can create accounts or log in using their credentials.
- Participate in Quizzes: Users can take quizzes as registered users or guests.
- View Quiz Results: After completing a quiz, users can view their results immediately.
- Leaderboard: View the leaderboard for each specific quiz, as well as the overall leaderboard, which ranks all users based on their cumulative quiz results.
- Score Tracking: Users can view their quiz history and track their performance over time.
## Technologies Used
- Backend: PHP, Laravel
- Frontend: HTML, CSS, JavaScript (Livewire for dynamic updates)
- Database: MySQL for storing quizzes, user profiles, and quiz results

## Project Structure & Timeline
**Week 1: Setup and Quiz Creation**
- Installed and configured PHP, Laravel, and MySQL.
- Designed the database schema for quizzes, users, questions, and scores.
- Developed an admin dashboard for managing quizzes and participants.
- Created a quiz creation form allowing admins to add multiple-choice and true/false questions.

**Week 2: Quiz Display and User Interaction**
- Implemented a responsive layout using HTML and CSS.
- Displayed quizzes with a countdown timer for timed tests.
- Integrated user authentication with role-based access (admin and user).
- Built functionality to allow users to submit answers and calculate their scores.

**Week 3: Score Tracking and History**
- Stored quiz scores in the database after completion.
- Developed a user dashboard for viewing past quiz results and tracking performance trends.
- Built admin reports to analyze quiz results and participant performance.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

#### Installation

1- Clone the project

```
git clone https://github.com/haweil/DEPI-Project.git
```

2- Install the dependencies

```
composer install
```

3- Configure the environment:

```
cp .env.example .env
```

4- Generate the application key:

```
php artisan key:generate
```

5- Migrate the database:

```
php artisan migrate --seed
```

6- Start the development server:

```
php artisan serve
```

## Running Tests

To run tests, run the following command

```
  php artisan test
```
## Team Members 
- Mohamed Kamal Abdel Hamid Haweil
- Khaled El Nabawy Ibrahim Ragab
- Ahmed Ashraf Mohamed Fawzy
- Mohamed Anwar Mohamed Qatoun
- Mohamed Kamal Abdel Khaleq Marjan

## Conclusion
The Online Quiz System offers a comprehensive platform for quiz management and participation. It is ideal for educational institutions, organizations, and individuals seeking to create, manage, and participate in quizzes easily. The system ensures real-time score tracking, robust user interfaces, and a seamless experience for admins and participants.
