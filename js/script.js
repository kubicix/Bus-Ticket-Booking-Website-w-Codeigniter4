
document.getElementById('donusCheckbox').addEventListener('change', function() {
        var donusTarihiInput = document.getElementById('donusTarihi');
        donusTarihiInput.disabled = !this.checked;
        if (!this.checked) {
            donusTarihiInput.value = ''; // Dönüş tarihini sıfırla
        }
});
