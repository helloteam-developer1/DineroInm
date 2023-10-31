<div class="grid grid-cols-3 m-2 mr-4">
        <div class="col-span-1 text-start self-center">
            <i class="fa-solid fa-minus plus-prestamo pointer" onclick="updatePrestamo(false)"></i>
            <span class="fontinfo" ><strong>$0</strong></span>
        </div>
        <div class="col-span-1 text-left lg:text-center xl:text-center">
            <span class="text-green valorCambiar" style="font-size: 2.3rem"><strong id="showPrestamo">$0</strong></span>
        </div>
        <div class="col-span-1 text-end self-center">
            <span class="fontinfo"><strong>$3,000</strong></span>
            <i class="fa-solid fa-plus plus-prestamo pointer" onclick="updatePrestamo(true)"></i>
        </div>
        <div  class="col-span-3">
            <p class="range">
                <input type="range" min="0" max="3000" value="0" step="1" id="prestamo" autocomplete="off">
                <output hidden></output>

            </p>
            {{-- <input wire:ignore id="prestamo" wire:model="prestamo"  type="range" max="3000"  > --}}
        </div>

@push('js')
    <script>
        $(document).on('change', '#prestamo', function (e) {
           let prestamo = $(this).val();
            $('#showPrestamo').html(separator(prestamo));
        });

        const updatePrestamo = action => {

            let prestamo = $('#prestamo').val();

            if ( action && prestamo < 3000 ) {

                operacion = parseInt(prestamo) + parseInt(1);
                $('#showPrestamo').html(separator(operacion));
                $('#prestamo').val(operacion);
            }

            if ( !action && prestamo > 0) {

                operacion = parseInt(prestamo) - parseInt(1);
                $('#showPrestamo').html(separator(operacion));
                $('#prestamo').val(operacion);
            }

        }

    </script>
@endpush
</div>
