      /* Hiện modal khi đăng kí thành công */
      function closeModal() {
            document.getElementById('successModal').classList.remove('show');
        }

        window.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('successModal');
            if (modal) {
                modal.classList.add('show');
            }
        });

        
    function setupPasswordToggle(toggleId, inputId) {
        const toggle = document.getElementById(toggleId);
        const input = document.getElementById(inputId);
        const icon = toggle.querySelector("i");

        toggle.addEventListener("click", function () {
            const isHidden = input.type === "password";
            input.type = isHidden ? "text" : "password";

            icon.classList.toggle("fa-eye-slash", !isHidden);
            icon.classList.toggle("fa-eye", isHidden);
        });
    }

    setupPasswordToggle("togglePassword", "password");
    setupPasswordToggle("toggleConfirmPassword", "password_confirmation");