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

   <img width="1364" height="675" alt="image" src="https://github.com/user-attachments/assets/7c9fafb8-bcac-434e-ba8c-cc0bd21e853e" />
   <img width="1365" height="674" alt="image" src="https://github.com/user-attachments/assets/0cc5283c-cdcc-46d5-8aac-0c4ea69c4d92" />
<img width="1356" height="672" alt="image" src="https://github.com/user-attachments/assets/72b36cae-bcbf-48ad-b54f-fee11feb8da5" />
<img width="1363" height="671" alt="image" src="https://github.com/user-attachments/assets/750e86a0-5ce4-4825-8416-9f239320f825" />



