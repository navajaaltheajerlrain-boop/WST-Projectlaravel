# Personal Task Manager

Project Code: WST21-PM-2026-SF

Student Name: NAVAJA, ALTHEA JERLRAIN 

Course & Year: BSIT 2

Database Used: SQLite

Features:
- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status

## Overview
This project is a simple personal task manager built with Laravel. It allows users to add tasks, view all saved tasks, update task details, delete items, and set task status as Pending or Completed.

## How It Works
1. The user opens the app in the browser and goes to the task list page.
2. A task is created by entering a title and description, then submitting the form.
3. The request is sent to a Laravel route, which calls the task controller.
4. The controller validates the input and stores the task in the SQLite database through the Task model.
5. The task list is retrieved from the database and displayed in the Blade view.
6. The user can edit a task, update its details, or change its status to Pending or Completed.
7. If the user deletes a task, the controller removes it from the database and refreshes the list.
8. The page updates dynamically according to the latest saved data in the database.

