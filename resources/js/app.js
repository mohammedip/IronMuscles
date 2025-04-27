import './bootstrap';



document.querySelectorAll('.table-filter').forEach(select => {
    select.addEventListener('change', function () {
        const filterValue = this.value;
        const endpoint = this.dataset.endpoint;
        const targetSelector = this.dataset.target;

        axios.get(endpoint, {
            params: { filter: filterValue }
        })
        .then(response => {
            document.querySelector(targetSelector).innerHTML = response.data;
        })
        .catch(error => {
            console.error("Filter error:", error);
        });
    });
});

