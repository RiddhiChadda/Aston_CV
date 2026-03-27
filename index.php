<?php include 'includes/header.php'; ?>

<section class="hero-block">
    <p class="eyebrow-text">Dynamic CV Database Website</p>
    <h2>AstonCV</h2>
    <p class="hero-text">
        A secure, database-driven platform where programmers can register, log in,
        build their CV, explore other profiles, and search by name or programming language.
    </p>
</section>

<section class="home-grid">
    <div class="home-card">
        <h3>Purpose</h3>
        <p>
            AstonCV is designed as a dynamic web application that stores and displays
            programmer CVs using PHP and MySQL. It demonstrates user authentication,
            database integration, protected pages, search functionality, and profile updating.
        </p>
    </div>

    <div class="home-card">
        <h3>Core Features</h3>
        <ul>
            <li>Register as a new user</li>
            <li>Log in securely</li>
            <li>View all CVs</li>
            <li>Search by name or programming language</li>
            <li>View full CV details</li>
            <li>Update your own CV</li>
        </ul>
    </div>
</section>

<section class="home-banner">
    <p>
        Built as part of a server-side web development portfolio using PHP, MySQL,
        prepared statements, session-based authentication, and protected routes.
    </p>
</section>

<section class="home-grid">
    <div class="home-card">
        <h3>User Flow</h3>
        <p>
            Users create an account, log in, manage their own CV, and explore other
            registered profiles through the CV listing and search pages.
        </p>
    </div>

    <div class="home-card">
        <h3>Security Focus</h3>
        <p>
            The application includes protected pages, password hashing, prepared statements,
            session handling, validation checks, and restricted access based on login state.
        </p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>