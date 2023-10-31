<div class="grid grid-cols-3 m-2 mr-4">
        <div class="col-span-1 text-start self-center">
            <i class="fa-solid fa-minus plus-prestamo pointer menos" ></i>
            <span class="texto-gris fontinfo" ><strong>1 mes</strong></span>
        </div>
        <div class="col-span-1 text-center">
            <span class="text-green textoResaltado valorCambiar" style="font-size: 2.3rem;"><strong id="showTiempo">0 mes</strong></span>
        </div>
        <div class="col-span-1 text-end self-center">
            <span class="texto-gris fontinfo"><strong>6 meses</strong></span>
            <i class="fa-solid fa-plus plus-prestamo pointer mas" ></i>
        </div>


        <div class="col-span-3">
            <p class="range">
                <input type="range" min="0"  max="6" value="0" id="tiempo" autocomplete="off">
                <output hidden></output>

            </p>
            {{-- <input wire:ignore id="prestamo" wire:model="prestamo"  type="range" max="3000"  > --}}
        </div>

<script>


    $(document).on('change', '#tiempo', function (e) {

            let tiempo = $(this).val();
            $('#showTiempo').html(`${tiempo} mes`);

    });
    $(document).on('change', '#tiempo', function (e) {

        if ($(this).val() == 0) {
            $('#tiempo').val(0)
            sliders();
            let tiempo = $(this).val();
            $('#showTiempo').html(separator(tiempo));
        }
    });
    $('.mas').click(function (e) {
        let tiempo = $('#tiempo').val();

        if (tiempo < 6) {

            $('#tiempo').val(parseInt(tiempo) + parseInt(1))
            $('#showTiempo').html(`${parseInt(tiempo) + parseInt(1)} mes`);
            sliders();
        }
    });

    $('.menos').click(function (e) {
        let tiempo = $('#tiempo').val();

        if (tiempo > 0) {

            $('#tiempo').val(parseInt(tiempo) - parseInt(1))
            $('#showTiempo').html(`${parseInt(tiempo) - parseInt(1)} mes`);
            sliders();
        }
    });
</script>

</div>
