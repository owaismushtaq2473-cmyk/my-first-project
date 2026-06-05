<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        :root {
            --bg-gradient: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            --card-bg: rgba(255, 255, 255, 0.95);
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #cbd5e1;
            --focus-ring: rgba(79, 70, 229, 0.15);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            background: var(--bg-gradient);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background: var(--card-bg);
            padding: 45px 40px;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 480px;
            backdrop-filter: blur(8px);
        }

        h2 {
            margin-bottom: 8px;
            color: var(--text-main);
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            letter-spacing: -0.5px;
        }

        .subtitle {
            text-align: center;
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 32px;
        }

        /* Modern Floating Labels */
        .input-group {
            position: relative;
            margin-bottom: 24px;
        }

        .input-group input {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 16px;
            color: var(--text-main);
            background-color: transparent;
            outline: none;
            transition: all 0.2s ease-in-out;
        }

        /* Moves label up when input is focused or has text */
        .input-group label {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--card-bg);
            padding: 0 6px;
            color: var(--text-muted);
            font-size: 15px;
            pointer-events: none;
            transition: all 0.2s ease-in-out;
        }

        .input-group input:focus,
        .input-group input:valid {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--focus-ring);
        }

        .input-group input:focus ~ label,
        .input-group input:valid ~ label {
            top: 0;
            font-size: 12px;
            color: var(--primary);
            font-weight: 600;
        }

        button {
            width: 100%;
            padding: 14px;
            background-color: var(--primary);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);
            margin-top: 8px;
        }

        button:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
        }

        button:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Get Started</h2>
    <p class="subtitle">Enter your details to register your student profile</p>
    
    <form action="process.php" method="POST">
        <div class="input-group">
            <input type="text" id="student_name" name="student_name" required autocomplete="off">
            <label for="student_name">Full Name</label>
        </div>
        <div class="input-group">
            <input type="text" id="father_name" name="father_name" required autocomplete="off">
            <label for="father_name">Father's Name</label>
        </div>
        <div class="input-group">
            <input type="text" id="student_id" name="student_id" required autocomplete="off">
            <label for="student_id">Student ID</label>
        </div>
        <div class="input-group">
            <input type="email" id="email" name="email" required autocomplete="off">
            <label for="email">Email Address</label>
        </div>
        <button type="submit" name="submit">Create Account</button>
    </form>
</div>

</body>
</html>