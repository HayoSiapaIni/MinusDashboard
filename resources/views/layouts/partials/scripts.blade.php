<!-- navbar -->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('js/search.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

function getLokasiProduk() {
    const x = document.getElementById("get-lokasi");
    const y = document.getElementById("pilihan");
    if (x && y) {
        y.addEventListener("click", function(){
            x.submit();
        })
        
    }
    
}




// $(".lokasi").on("click", function () {
//     $value = $(this).text();
//     console.log($value);

//     if ($value) {
//         $("#all-data").hide();
//         $("#search-data").hide();
//         $("#lokasi-data").show();
//     } else {
//         $("#all-data").show();
//         $("#search-data").hide();
//         $("#lokasi-data").hide();
//     }

//     $.ajax({
//         type: "get",
//         url: "lokasi",
//         data: { lokasi : $value },

//         success: function (data) {
//             console.log(data);
//             $("#lokasi-data").html(data);
//         },
//     });

// });
</script>





