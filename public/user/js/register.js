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

        
    // Hiện mật khẩu
    document.getElementById('showPasswords').addEventListener('change', function () {
        const show = this.checked;
        document.getElementById('password').type = show ? 'text' : 'password';
        document.getElementById('password_confirmation').type = show ? 'text' : 'password';
    });