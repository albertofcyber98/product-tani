<script src="./../asset/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    const navbar = document.querySelector('.col-navbar')
    const cover = document.querySelector('.screen-cover')

    const sidebar_items = document.querySelectorAll('.sidebar-item')

    function toggleNavbar() {
        navbar.classList.toggle('d-none')
        cover.classList.toggle('d-none')
    }

    function toggleActive(e) {
        sidebar_items.forEach(function(v, k) {
            v.classList.remove('active')
        })
        e.closest('.sidebar-item').classList.add('active')

    }
</script>
<script src="../asset/sweetalert/sweetalert.min.js"></script>