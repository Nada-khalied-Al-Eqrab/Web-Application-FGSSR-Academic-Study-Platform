# Contributing to FGSSR Academic Study Platform 🎓

First off, thank you for considering contributing to the FGSSR Academic Study Platform! It's people like you that make this platform a better tool for students, faculty, and administrators.

To maintain code quality, systematic documentation, and project alignment with academic requirements, please review and follow these guidelines.

---

## 📌 Table of Contents
- [Code of Conduct](#-code-of-conduct)
- [How Can I Contribute?](#-how-can-i-contribute)
  - [Reporting Bugs](#reporting-bugs)
  - [Suggesting Enhancements](#suggesting-enhancements)
  - [Code Contributions](#code-contributions)
- [Git Workflow & Branching Strategy](#-git-workflow--branching-strategy)
- [Coding Standards (Laravel & PHP)](#-coding-standards-laravel--php)
- [Database Normalization Guidelines](#-database-normalization-guidelines)
- [Documentation & UML Requirements](#-documentation--uml-requirements)

---

## 📜 Code of Conduct

By participating in this project, you are expected to maintain a professional, respectful, and collaborative environment aligned with university standards. 

---

## 🤝 How Can I Contribute?

### Reporting Bugs
If you find a bug or system failure (e.g., database validation bypass, chat latency, or schedule overlap):
1. Open an **Issue** on GitHub.
2. Use a clear and descriptive title.
3. Describe the exact steps to reproduce the problem.
4. Include screenshots or error logs (e.g., Laravel log files from `storage/logs/laravel.log`).
5. Specify your environment (PHP version, browser, OS).

### Suggesting Enhancements
If you want to suggest new features from the project roadmap (like *Barcode Attendance*, *Online Exams*, or *AI Analytics*):
1. Open an **Issue** and label it as an `enhancement`.
2. Explain the core utility of the feature and how it benefits students or faculty.
3. Provide a brief architectural explanation if applicable.

### Code Contributions
1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Commit your changes with clear messages.
4. Submit a **Pull Request (PR)** targeting the `main` or `develop` branch.

---

## 🏗️ Git Workflow & Branching Strategy

We follow a strict branching model to keep the codebase clean and stable:

* `main` / `master` - Production-ready code, highly stable.
* `develop` - Integration branch for features currently being developed and tested.
* `feature/feature-name` - Isolated branch for building a specific functional component (e.g., `feature/chat-system`).
* `bugfix/issue-name` - Isolated branch for resolving identified system bugs.

### Commit Message Guidelines:
Use descriptive verbs when writing commit messages:
* `feat: Add real-time notification engine using Laravel Events`
* `fix: Resolve venue schedule overlap constraint in place migration`
* `docs: Update UML Component and Use Case diagrams`

---

## 💻 Coding Standards (Laravel & PHP)

To maintain clean and uniform code architecture, please follow **PSR-12** standards and standard Laravel best practices:

1. **MVC Isolation:** Keep business logic strictly inside Services/Repositories. Controllers should only handle requests and return responses.
2. **Database Queries:** Use Eloquent ORM relationships properly; avoid heavy raw queries unless optimized for complex statistical procedures.
3. **Validation:** Always use **Form Requests** for validating data coming from forms. Never validate directly inside Controllers.
4. **Naming Conventions:**
   - Controllers: PascalCase (`CourseController.php`).
   - Models: Singular PascalCase (`Diploma.php`).
   - Database Tables: Plural snake_case (`exam_tables`, `schedules`).
   - Methods/Variables: camelCase (`getStudentSchedule()`).

---

## 🗄️ Database Normalization Guidelines

Any changes to the database structure must adhere to the **Extended Entity-Relationship (EER)** layout configured for this project:
* Ensure proper use of Foreign Keys and constraints.
* Set appropriate cascading policies (`->onDelete('cascade')` for atomic components like messages or course files).
* Run `php artisan migrate` locally to test your migrations before committing.

---

## 📝 Documentation & UML Requirements

Since this platform is backed by a highly disciplined system analysis framework:
* Any change in core business processes must be accompanied by an update to the corresponding **UML Diagram** (Use Case, Activity, or Sequence diagrams).
* If data paths are modified, update the **Data Flow Diagram (DFD)** Level 1 and Level 2 structures accordingly.

---
Thank you for your dedication to advancing digital transformation at FGSSR! ❤️
