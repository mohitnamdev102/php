<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - <?= htmlspecialchars($user['name']) ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .user-info {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
        }

        .user-info p {
            margin: 5px 0;
            font-size: 14px;
        }

        .form-container {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
            font-size: 16px;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #ff6b6b;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
            background: white;
        }

        .form-group input.error {
            border-color: #dc3545;
            background: #fff5f5;
        }

        .form-group input.success {
            border-color: #28a745;
            background: #f8fff9;
        }

        .form-group input[readonly] {
            background: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 8px;
            display: none;
            padding: 8px 12px;
            background: #fff5f5;
            border-radius: 4px;
            border-left: 4px solid #dc3545;
        }

        .success-message {
            color: #28a745;
            font-size: 14px;
            margin-top: 8px;
            display: none;
            padding: 8px 12px;
            background: #f8fff9;
            border-radius: 4px;
            border-left: 4px solid #28a745;
        }

        .character-count {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            text-align: right;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            min-width: 120px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #545b62;
            transform: translateY(-1px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 53, 69, 0.4);
        }

        .btn:disabled {
            background: #6c757d;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .loading {
            display: none;
            text-align: center;
            margin-top: 20px;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #ff6b6b;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 0 auto 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .form-footer {
            background: #f8f9fa;
            padding: 25px;
            border-top: 1px solid #e9ecef;
            text-align: center;
        }

        .form-footer a {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #ee5a24;
            text-decoration: underline;
        }

        .changes-indicator {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            display: none;
        }

        .field-highlight {
            animation: highlight 0.5s ease;
        }

        @keyframes highlight {
            0% { background-color: #fff3cd; }
            100% { background-color: transparent; }
        }

        @media (max-width: 768px) {
            .container {
                margin: 10px;
            }

            .form-container {
                padding: 25px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Edit User</h1>
            <div class="user-info">
                <p><strong>User ID:</strong> <?= $user['id'] ?></p>
                <p><strong>Current Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
                <p><strong>Last Updated:</strong> <span id="lastUpdated">Just now</span></p>
            </div>
        </div>

        <div class="form-container">
            <div class="changes-indicator" id="changesIndicator">
                <strong>⚠️ Changes detected!</strong> You have unsaved changes. Please save or cancel your changes.
            </div>

            <form id="editUserForm" method="post" action="<?= base_url('/users/update/'.$user['id']) ?>">
                <div class="form-group">
                    <label for="id">User ID</label>
                    <input type="text" id="id" name="id" value="<?= $user['id'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" 
                           value="<?= htmlspecialchars($user['name']) ?>" 
                           placeholder="Enter full name" 
                           maxlength="50" 
                           required>
                    <div class="character-count"><?= strlen($user['name']) ?>/50 characters</div>
                    <div class="error-message" id="nameError">Please enter a valid name</div>
                </div>

                <div class="form-group">
                    <label for="age">Age *</label>
                    <input type="number" id="age" name="age" 
                           value="<?= $user['age'] ?>" 
                           placeholder="Enter age" 
                           min="1" 
                           max="120" 
                           required>
                    <div class="error-message" id="ageError">Please enter a valid age (1-120)</div>
                </div>

                <div class="form-group">
                    <label for="number">Phone Number *</label>
                    <input type="tel" id="number" name="number" 
                           value="<?= htmlspecialchars($user['number']) ?>" 
                           placeholder="Enter phone number" 
                           pattern="[0-9]{10,15}" 
                           maxlength="15" 
                           required>
                    <div class="error-message" id="numberError">Please enter a valid phone number (10-15 digits)</div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <span id="submitText">Update User</span>
                    </button>
                    <a href="<?= base_url('/users') ?>" class="btn btn-secondary">Cancel</a>
                    <button type="button" class="btn btn-danger" onclick="deleteUser(<?= $user['id'] ?>)">Delete User</button>
                </div>

                <div class="loading" id="loading">
                    <div class="spinner"></div>
                    <p>Updating user information...</p>
                </div>
            </form>
        </div>

        <div class="form-footer">
            <a href="<?= base_url('/users') ?>">← Back to User List</a>
        </div>
    </div>

    <script>
        // Form elements
        const form = document.getElementById('editUserForm');
        const nameInput = document.getElementById('name');
        const ageInput = document.getElementById('age');
        const numberInput = document.getElementById('number');
        const submitBtn = document.getElementById('submitBtn');
        const loading = document.getElementById('loading');
        const changesIndicator = document.getElementById('changesIndicator');
        const lastUpdated = document.getElementById('lastUpdated');

        // Original values for change detection
        const originalValues = {
            name: nameInput.value,
            age: ageInput.value,
            number: numberInput.value
        };

        let hasChanges = false;
        let autoSaveTimer;

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
            
            checkForChanges();
        });

        // Real-time validation
        nameInput.addEventListener('blur', validateName);
        ageInput.addEventListener('blur', validateAge);
        numberInput.addEventListener('blur', validateNumber);

        // Change detection
        [nameInput, ageInput, numberInput].forEach(input => {
            input.addEventListener('input', function() {
                checkForChanges();
                scheduleAutoSave();
            });
        });

        function checkForChanges() {
            const currentValues = {
                name: nameInput.value,
                age: ageInput.value,
                number: numberInput.value
            };

            hasChanges = JSON.stringify(currentValues) !== JSON.stringify(originalValues);
            
            if (hasChanges) {
                changesIndicator.style.display = 'block';
                submitBtn.style.background = 'linear-gradient(135deg, #28a745 0%, #20c997 100%)';
                document.getElementById('submitText').textContent = 'Save Changes';
            } else {
                changesIndicator.style.display = 'none';
                submitBtn.style.background = 'linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%)';
                document.getElementById('submitText').textContent = 'Update User';
            }
        }

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
                
                // Update timestamp
                const now = new Date();
                lastUpdated.textContent = now.toLocaleString();
                
                // Submit form after a short delay to show loading
                setTimeout(() => {
                    form.submit();
                }, 800);
            } else {
                // Focus on first invalid field
                if (!isNameValid) {
                    nameInput.focus();
                    nameInput.classList.add('field-highlight');
                } else if (!isAgeValid) {
                    ageInput.focus();
                    ageInput.classList.add('field-highlight');
                } else if (!isNumberValid) {
                    numberInput.focus();
                    numberInput.classList.add('field-highlight');
                }
                
                // Remove highlight after animation
                setTimeout(() => {
                    document.querySelectorAll('.field-highlight').forEach(el => {
                        el.classList.remove('field-highlight');
                    });
                }, 500);
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

        // Auto-save draft
        function scheduleAutoSave() {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(() => {
                const formData = {
                    name: nameInput.value,
                    age: ageInput.value,
                    number: numberInput.value,
                    userId: <?= $user['id'] ?>
                };
                localStorage.setItem('editUserDraft_' + <?= $user['id'] ?>, JSON.stringify(formData));
            }, 2000);
        }

        // Load draft on page load
        window.addEventListener('load', function() {
            const draft = localStorage.getItem('editUserDraft_' + <?= $user['id'] ?>);
            if (draft) {
                const formData = JSON.parse(draft);
                if (formData.userId == <?= $user['id'] ?>) {
                    nameInput.value = formData.name || '';
                    ageInput.value = formData.age || '';
                    numberInput.value = formData.number || '';
                    nameInput.dispatchEvent(new Event('input'));
                    checkForChanges();
                }
            }
        });

        // Clear draft on successful submission
        form.addEventListener('submit', function() {
            localStorage.removeItem('editUserDraft_' + <?= $user['id'] ?>);
        });

        // Delete user function
        function deleteUser(userId) {
            const userName = nameInput.value || '<?= htmlspecialchars($user['name']) ?>';
            if (confirm(`Are you sure you want to delete user "${userName}"? This action cannot be undone.`)) {
                // Show loading
                submitBtn.disabled = true;
                loading.style.display = 'block';
                loading.querySelector('p').textContent = 'Deleting user...';
                
                // Redirect to delete URL
                setTimeout(() => {
                    window.location.href = `<?= base_url('/users/delete/') ?>${userId}`;
                }, 500);
            }
        }

        // Remove browser alerts for unsaved changes
        // window.addEventListener('beforeunload', function(e) {
        //     if (hasChanges) {
        //         e.preventDefault();
        //         e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
        //         return e.returnValue;
        //     }
        // });

        // Initialize
        checkForChanges();
    </script>
</body>
</html>
