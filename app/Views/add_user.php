<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($user) ? 'Edit User' : 'Add New User' ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .form-container {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
        }

        .form-group input.error {
            border-color: #dc3545;
        }

        .form-group input.success {
            border-color: #28a745;
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .success-message {
            color: #28a745;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #545b62;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }

        .character-count {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            text-align: right;
        }

        .loading {
            display: none;
            text-align: center;
            margin-top: 10px;
        }

        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #007bff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .form-footer {
            background-color: #f8f9fa;
            padding: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                margin: 10px;
            }

            .form-container {
                padding: 20px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?= isset($user) ? 'Edit User' : 'Add New User' ?></h1>
            <p><?= isset($user) ? 'Update user information' : 'Enter user details below' ?></p>
        </div>

        <div class="form-container">
            <form id="userForm" method="post" action="<?= isset($user) ? base_url('/users/update/' . $user['id']) : base_url('/users/store') ?>">
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" 
                           value="<?= isset($user) ? htmlspecialchars($user['name']) : '' ?>" 
                           placeholder="Enter full name" 
                           maxlength="50" 
                           required>
                    <div class="character-count">0/50 characters</div>
                    <div class="error-message" id="nameError">Please enter a valid name</div>
                </div>

                <div class="form-group">
                    <label for="age">Age *</label>
                    <input type="number" id="age" name="age" 
                           value="<?= isset($user) ? $user['age'] : '' ?>" 
                           placeholder="Enter age" 
                           min="1" 
                           max="120" 
                           required>
                    <div class="error-message" id="ageError">Please enter a valid age (1-120)</div>
                </div>

                <div class="form-group">
                    <label for="number">Phone Number *</label>
                    <input type="tel" id="number" name="number" 
                           value="<?= isset($user) ? htmlspecialchars($user['number']) : '' ?>" 
                           placeholder="Enter phone number" 
                           pattern="[0-9]{10,15}" 
                           maxlength="15" 
                           required>
                    <div class="error-message" id="numberError">Please enter a valid phone number (10-15 digits)</div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <?= isset($user) ? 'Update User' : 'Add User' ?>
                    </button>
                    <a href="<?= base_url('/users') ?>" class="btn btn-secondary">Cancel</a>
                    <?php if(isset($user)): ?>
                        <button type="button" class="btn btn-danger" onclick="deleteUser(<?= $user['id'] ?>)">Delete User</button>
                    <?php endif; ?>
                </div>

                <div class="loading" id="loading">
                    <div class="spinner"></div>
                    <p>Processing...</p>
                </div>
            </form>
        </div>

        <div class="form-footer">
            <a href="<?= base_url('/users') ?>">← Back to User List</a>
        </div>
    </div>

    <script>
        // Form validation and interaction
        const form = document.getElementById('userForm');
        const nameInput = document.getElementById('name');
        const ageInput = document.getElementById('age');
        const numberInput = document.getElementById('number');
        const submitBtn = document.getElementById('submitBtn');
        const loading = document.getElementById('loading');

        // Character count for name
        nameInput.addEventListener('input', function() {
            const count = this.value.length;
            this.nextElementSibling.textContent = `${count}/50 characters`;
            
            if (count > 45) {
                this.nextElementSibling.style.color = '#dc3545';
            } else if (count > 40) {
                this.nextElementSibling.style.color = '#ffc107';
            } else {
                this.nextElementSibling.style.color = '#666';
            }
        });

        // Real-time validation
        nameInput.addEventListener('blur', validateName);
        ageInput.addEventListener('blur', validateAge);
        numberInput.addEventListener('blur', validateNumber);

        function validateName() {
            const name = nameInput.value.trim();
            const nameError = document.getElementById('nameError');
            
            if (name.length < 2) {
                showError(nameInput, nameError, 'Name must be at least 2 characters long');
                return false;
            } else if (!/^[a-zA-Z\s]+$/.test(name)) {
                showError(nameInput, nameError, 'Name can only contain letters and spaces');
                return false;
            } else {
                showSuccess(nameInput, nameError);
                return true;
            }
        }

        function validateAge() {
            const age = parseInt(ageInput.value);
            const ageError = document.getElementById('ageError');
            
            if (isNaN(age) || age < 1 || age > 120) {
                showError(ageInput, ageError, 'Please enter a valid age between 1 and 120');
                return false;
            } else {
                showSuccess(ageInput, ageError);
                return true;
            }
        }

        function validateNumber() {
            const number = numberInput.value.replace(/\s/g, '');
            const numberError = document.getElementById('numberError');
            
            if (!/^\d{10,15}$/.test(number)) {
                showError(numberInput, numberError, 'Please enter a valid phone number (10-15 digits)');
                return false;
            } else {
                showSuccess(numberInput, numberError);
                return true;
            }
        }

        function showError(input, errorElement, message) {
            input.classList.remove('success');
            input.classList.add('error');
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }

        function showSuccess(input, errorElement) {
            input.classList.remove('error');
            input.classList.add('success');
            errorElement.style.display = 'none';
        }

        // Form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate all fields
            const isNameValid = validateName();
            const isAgeValid = validateAge();
            const isNumberValid = validateNumber();
            
            if (isNameValid && isAgeValid && isNumberValid) {
                // Show loading
                submitBtn.disabled = true;
                loading.style.display = 'block';
                
                // Submit form after a short delay to show loading
                setTimeout(() => {
                    form.submit();
                }, 500);
            } else {
                // Focus on first invalid field
                if (!isNameValid) nameInput.focus();
                else if (!isAgeValid) ageInput.focus();
                else if (!isNumberValid) numberInput.focus();
            }
        });

        // Phone number formatting
        numberInput.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 15) {
                value = value.substring(0, 15);
            }
            this.value = value;
        });

        // Delete user function
        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                window.location.href = `<?= base_url('/users/delete/') ?>${userId}`;
            }
        }

        // Initialize character count
        if (nameInput.value) {
            nameInput.dispatchEvent(new Event('input'));
        }

        // Auto-save draft (optional feature)
        let autoSaveTimer;
        const inputs = [nameInput, ageInput, numberInput];
        
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                clearTimeout(autoSaveTimer);
                autoSaveTimer = setTimeout(() => {
                    const formData = {
                        name: nameInput.value,
                        age: ageInput.value,
                        number: numberInput.value
                    };
                    localStorage.setItem('userFormDraft', JSON.stringify(formData));
                }, 1000);
            });
        });

        // Load draft on page load
        window.addEventListener('load', function() {
            const draft = localStorage.getItem('userFormDraft');
            if (draft && !nameInput.value) {
                const formData = JSON.parse(draft);
                nameInput.value = formData.name || '';
                ageInput.value = formData.age || '';
                numberInput.value = formData.number || '';
                nameInput.dispatchEvent(new Event('input'));
            }
        });

        // Clear draft on successful submission
        form.addEventListener('submit', function() {
            localStorage.removeItem('userFormDraft');
        });
    </script>
</body>
</html>
