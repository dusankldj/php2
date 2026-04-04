$(document).ready(function () {
    let timeout;

    let minRange = $('#minRange');
    let maxRange = $('#maxRange');


    let minDefault = parseInt(minRange.attr('min'));
    let maxDefault = parseInt(maxRange.attr('max'));


    let params = new URLSearchParams(window.location.search);

    let minVal = params.get('min_price') ?? minDefault;
    let maxVal = params.get('max_price') ?? maxDefault;


    minRange.val(minVal);
    maxRange.val(maxVal);

    $('#minInput').val(minVal);
    $('#maxInput').val(maxVal);
    function debounceAjax(){
        clearTimeout(timeout);
        timeout = setTimeout(fetchProducts, 800);
    }

    //  VALIDACIJA + SYNC
    function updateUI() {
        let min = parseInt($('#minRange').val());
        let max = parseInt($('#maxRange').val());

        //validacija dva filtera za cenu
        if (min > max) {
            min = max;
            $('#minRange').val(min);
        }

        if (max < min) {
            max = min;
            $('#maxRange').val(max);
        }
        //

        // sync inputa
        $('#minInput').val(min);
        $('#maxInput').val(max);
    }

    function fetchProducts(){
        let url = buildUrl();

        $.ajax({
            url: url.toString(),
            type: "GET",
            success: function (data) {
                $('#productsContainer').html(data);
                window.history.pushState({}, '', url);
            }
        });
    }

    // RANGE
    $('#minRange').on('input', function () {
        updateUI();
        debounceAjax();
    });

    $('#maxRange').on('input', function () {
        updateUI();
        debounceAjax();
    });

    // INPUT
    $('#minInput').on('input', function () {
        $('#minRange').val($(this).val());
        updateUI();
        debounceAjax();
    });

    $('#maxInput').on('input', function () {
        $('#maxRange').val($(this).val());
        updateUI();
        debounceAjax();
    });

    /*STA RADITI SA KATEGORIJAMA I PRETRAGOM, JER TO MORAMO
    * IMATI FUNKCIONALNO I NA HOME STRANICI?*/

    //KATEGORIJE
    $(document).on('click', '.categoryMenu', function (e) {
        e.preventDefault();

        let categoryId = $(this).data('id');

        let url = buildUrl();
        url.searchParams.set('category', categoryId);

        // ako nisi na store → redirect
        if (!isStorePage()) {
            window.location.href = url.toString();
            return;
        }

        // ako jesi → AJAX
        $.ajax({
            url: url.toString(),
            type: "GET",
            success: function (data) {
                $('#productsContainer').html(data);
                window.history.pushState({}, '', url);
            }
        });
    });

    //PRETRAGA
    $(document).on('click', "#searchButton", function () {
        let keyword = $("#searchField").val().trim();

        let url = buildUrl();
        url.searchParams.set('keyword', keyword);

        if (!isStorePage()) {
            window.location.href = url.toString();
            return;
        }

        $.ajax({
            url: url.toString(),
            type: "GET",
            success: function (data) {
                $('#productsContainer').html(data);
                window.history.pushState({}, '', url);
            }
        });
    });

    //DOSTUPNOST
    $(document).on('change', "#stock", function(){
        let stock=$(this).val();

        let url=buildUrl();

        url.searchParams.set('stock', stock);

        $.ajax({
            url: url.toString(),
            type: "GET",
            success: function (data) {
                $('#productsContainer').html(data);
                window.history.pushState({}, '', url);
            }
        });
    })

    //POPUST
    $(document).on('change', "#discount", function(){
        let discount=$(this).val();

        let url=buildUrl();
        url.searchParams.set('discount', discount)

        $.ajax({
            url:url.toString(),
            type:"GET",
            success:function(data){
                $('#productsContainer').html(data);
                window.history.pushState({}, '', url);
            }
        });
    })

    //SORTIRANJE PO IMENU PROIZVODA
    $(document).on('change', "#sortByName", function(){
       let sortName=$(this).val();

       let url=buildUrl();

       url.searchParams.set('sort', sortName);

       $("#sortByPrice").val('default');

        $.ajax({
            url:url.toString(),
            type:"GET",
            success:function(data){
                $('#productsContainer').html(data);
                window.history.pushState({}, '', url);
            }
        });
    });

    //SORTIRANJE PO CENI PROIZVODA
    $(document).on('change', "#sortByPrice", function(){
        let sortPrice=$(this).val();

        let url=buildUrl();

        url.searchParams.set('sort', sortPrice);

        $("#sortByName").val('default');

        $.ajax({
            url:url.toString(),
            type:"GET",
            success:function(data){
                $('#productsContainer').html(data);
                window.history.pushState({}, '', url);
            }
        });
    });

    //PAGINACIJA - POGELDATI!!
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();

        let url = $(this).attr('href');

        $.ajax({
            url: url,
            type: "GET",
            success: function (data) {
                $('#productsContainer').html(data);
                window.history.pushState({}, '', url);
            }
        });
    });
    function buildUrl() {
        let isStore = isStorePage();

        // ako nisi na store → uvek ideš na /store
        let baseUrl = isStore ? window.location.href : '/store';

        let url = new URL(baseUrl, window.location.origin);

        // CATEGORY
        let category = url.searchParams.get('category');
        if (category) {
            url.searchParams.set('category', category);
        }

        // KEYWORD (uzima iz inputa ako postoji)
        let keyword = $('#searchField').val()?.trim();
        if (keyword) {
            url.searchParams.set('keyword', keyword);
        }

        // samo ako si na store dodaj ostale filtere
        if (isStore) {
            let min = $('#minRange').val();
            let max = $('#maxRange').val();

            if (min) url.searchParams.set('min_price', min);
            if (max) url.searchParams.set('max_price', max);

            let stock = $('#stock').val();
            if (stock) url.searchParams.set('stock', stock);

            let discount = $('#discount').val();
            if (discount) url.searchParams.set('discount', discount);

            let sortName = $('#sortByName').val();
            let sortPrice = $('#sortByPrice').val();

            if (sortName != 'default') url.searchParams.set('sort', sortName);
            if (sortPrice != 'default') url.searchParams.set('sort', sortPrice);
        }

        return url;
    }

    function isStorePage() {
        return window.location.pathname.includes('/store');
    }

});

//delete product
$(document).on('click', '.buttonDeleteProduct', function(){
    let button = $(this);
    let productID=button.data('id');

    $.ajax({
        url: `/admin/product/${productID}`,
        method: "DELETE",
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        data:{
            id:productID,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            button.closest('.bg-white').remove();
        },
        error:function(message){
            console.log(message.responseText);
        }
    });
});

