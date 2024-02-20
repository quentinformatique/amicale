document.getElementById('filter').addEventListener('change', function() {
    window.location.href = '/sell?filter=' + this.value;
});