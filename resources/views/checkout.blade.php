@extends('layouts.welcome-ecommerce-template')

@section('content')
<!-- component -->
<style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>


<div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 pb-10 pt-40">
    <div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
        <div class="w-full pt-1 pb-5">
            <div class="bg-indigo-500 text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
                <i class="mdi mdi-credit-card-outline text-3xl"></i>
            </div>
        </div>
        <div class="mb-10">
            <h1 class="text-center font-bold text-xl uppercase">Informacion de Pago Seguro</h1>
        </div>
        <div class="mb-3 flex -mx-2">
            <div class="px-2">
                <label for="type1" class="flex items-center cursor-pointer">
                    <input type="radio" class="form-radio h-5 w-5 text-indigo-500" name="type" id="type1" checked>
                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                </label>
            </div>
        </div>
 <form class="mx-auto" method="POST" action="{{route('checkout-input',[$id])}}">
    @csrf
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Name on card</label>
            <div>
                <input name="nombre" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="John Smith" type="text"/>
            </div>
        </div>
        <div class="mb-3">
            <label class="font-bold text-sm mb-2 ml-1">Card number</label>
            <div>
                <input name="card_number" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="0000 0000 0000 0000" type="number"/>
            </div>
        </div>
        <div class="mb-3 -mx-2 flex items-end">
            <div class="px-2 w-1/2">
                <label class="font-bold text-sm mb-2 ml-1">Expiration date</label>
                <div>
                    <select name="month" class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                        <option value="01">01 - January</option>
                        <option value="02">02 - February</option>
                        <option value="03">03 - March</option>
                        <option value="04">04 - April</option>
                        <option value="05">05 - May</option>
                        <option value="06">06 - June</option>
                        <option value="07">07 - July</option>
                        <option value="08">08 - August</option>
                        <option value="09">09 - September</option>
                        <option value="10">10 - October</option>
                        <option value="11">11 - November</option>
                        <option value="12">12 - December</option>
                    </select>
                </div>
            </div>
            <div class="px-2 w-1/2">
                <select name="year" class="form-select w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors cursor-pointer">
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                </select>
            </div>
        </div>
        <div class="mb-10">
            <label class="font-bold text-sm mb-2 ml-1">Security code</label>
            <div>
                <input name="code" class="w-32 px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="000" type="number"/>
            </div>
        </div>
        <div>
            <button type="submit" class="block w-full show-modal max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold" onclick="openModal('modal')"><i class="mdi mdi-lock-outline mr-1"></i> Pagar Ahora</button>
           
            <div id="modal" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
    <div class="relative top-40 mx-auto shadow-lg rounded-md bg-white max-w-md">

        <!-- Modal header -->
        <div class="flex justify-between items-center bg-green-500 text-white text-2xl font-bold rounded-t-md px-4 py-2">
            <h3>Compra Exitosa</h3>
            <button onclick="closeModal()">x</button>
        </div>
        <!-- Modal body -->
        <div class="max-h-48 overflow-y-scroll p-4">
            <p>!Muchas Gracias!</p>
        </div>
    </div>
</div>

<script type="text/javascript">
function openModal(modalId) {
    modal = document.getElementById(modalId)
    modal.classList.remove('hidden')
}

function closeModal() {
    modal = document.getElementById('modal')
    modal.classList.add('hidden')
}
</script>
        </div>
  </form>
    </div>
</div>
  
@endsection