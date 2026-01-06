@extends('layouts.user')

@section('title', 'Checkout')

@section('content')
  <div class="max-w-5xl mx-auto bg-white shadow-2xl min-h-screen">
    <div class="px-6 py-4 border-b flex items-center justify-between">
      <h1 class="text-xl font-bold">Checkout</h1>
      <a href="/menu" class="text-sm text-sky-600">Back to menu</a>
    </div>
    <div class="px-6 py-6">
      @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-50 text-green-700">{{ session('success') }}</div>
      @endif
      @if(session('error'))
        <div class="mb-4 p-3 rounded bg-red-50 text-red-700">{{ session('error') }}</div>
      @endif
      <div class="grid md:grid-cols-2 gap-8">
        <div>
          <h2 class="font-semibold mb-3">Your Cart</h2>
          <div class="border rounded-lg divide-y">
            @forelse($cart as $it)
              <div class="p-3 flex items-center justify-between">
                <div>
                  <div class="font-medium">{{ $it['name'] }}</div>
                  @if(!empty($it['comments']))
                    <div class="text-sm text-gray-600 italic mt-1">"{{ $it['comments'] }}"</div>
                  @endif
                  <div class="text-xs text-gray-500">{{ $it['qty'] }} × Rp {{ number_format($it['price'], 0, ',', '.') }}</div>
                </div>
                <div class="font-semibold">Rp {{ number_format($it['qty'] * $it['price'], 0, ',', '.') }}</div>
              </div>
            @empty
              <div class="p-3 text-gray-600">Cart is empty.</div>
            @endforelse
          </div>
          <div class="mt-3 flex items-center justify-between">
            <div class="text-sm text-gray-600">Total</div>
            <div class="font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</div>
          </div>
        </div>
        <div>
          <h2 class="font-semibold mb-3">Customer Info</h2>
          <form action="/checkout" method="POST" class="space-y-3">
            @csrf
            <div>
              <label class="block text-sm font-medium">Full name</label>
              <div class="mt-1 relative">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5">
                    <path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm0 2c-4.418 0-8 2.239-8 5v1h16v-1c0-2.761-3.582-5-8-5Z" />
                  </svg>
                </span>
                <input type="text" name="customer_name" placeholder="e.g., Dava Ihza Bagus Setyawan" required
                  class="pl-12 w-full rounded-md border-gray-300 focus:ring-sky-600 focus:border-sky-600">
              </div>
              <p class="mt-1 text-xs text-gray-500">Please enter your full name.</p>
            </div>
            <div>
              <label class="block text-sm font-medium">Phone number</label>
              <div class="mt-1 relative">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5">
                    <path
                      d="M6.62 10.79a15.5 15.5 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.05-.24 11.5 11.5 0 0 0 3.61.58 1 1 0 0 1 1 1v3.5a1 1 0 0 1-1 1A18 18 0 0 1 3 6a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1 11.5 11.5 0 0 0 .58 3.61 1 1 0 0 1-.24 1.05Z" />
                  </svg>
                </span>
                <input type="text" name="phone" placeholder="e.g., 0812-3456-7890"
                  class="pl-12 w-full rounded-md border-gray-300 focus:ring-sky-600 focus:border-sky-600">
              </div>
              <p class="mt-1 text-xs text-gray-500">Use your WhatsApp number if possible.</p>
            </div>
            <button type="submit" class="px-4 py-2 rounded-md bg-green-600 text-white hover:bg-green-700">Place
              Order</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Simple Alert Modal -->
  <div id="alert-modal" class="fixed inset-0 hidden items-center justify-center bg-black/40 p-4 z-[120]">
    <div class="w-full max-w-sm rounded-xl bg-white shadow-xl">
      <div class="px-4 py-3 border-b font-semibold">Notice</div>
      <div id="alert-message" class="px-4 py-4 text-sm text-gray-700">Message</div>
      <div class="px-4 py-3 border-t flex justify-end">
        <button id="alert-ok" class="px-3 py-1.5 rounded-md bg-sky-600 text-white hover:bg-sky-700">OK</button>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
  <script>
    const form = document.querySelector('form[action="/checkout"]');
    const nameInput = document.querySelector('input[name="customer_name"]');
    const phoneInput = document.querySelector('input[name="phone"]');
    const alertModal = document.getElementById('alert-modal');
    const alertMsg = document.getElementById('alert-message');
    const alertOk = document.getElementById('alert-ok');
    function openAlert(msg, focusEl) {
      alertMsg.textContent = msg;
      alertModal.classList.remove('hidden');
      alertModal.classList.add('flex');
      alertOk.onclick = () => {
        alertModal.classList.add('hidden');
        alertModal.classList.remove('flex');
        if (focusEl) focusEl.focus();
      };
    }
    const cartCount = {{ count($cart) }};
    form?.addEventListener('submit', (e) => {
      if (cartCount === 0) {
        e.preventDefault();
        openAlert('Your cart is empty. Please add items before placing an order.', null);
        return;
      }
      const nameVal = (nameInput?.value || '').trim();
      if (!nameVal) {
        e.preventDefault();
        openAlert('Please enter your full name.', nameInput);
        return;
      }
      if (/[0-9]/.test(nameVal)) {
        e.preventDefault();
        openAlert('Name must not contain numbers.', nameInput);
        return;
      }
      const nameRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'\.\-]+$/;
      if (!nameRegex.test(nameVal)) {
        e.preventDefault();
        openAlert('Name can only contain letters, spaces, apostrophes, dots, or hyphens.', nameInput);
        return;
      }
      const phoneVal = (phoneInput?.value || '').trim();
      if (phoneVal) {
        if (/[A-Za-z]/.test(phoneVal)) {
          e.preventDefault();
          openAlert('Phone number must not contain letters.', phoneInput);
          return;
        }
        const digits = phoneVal.replace(/\D/g, '');
        if (digits.length < 8 || digits.length > 15) {
          e.preventDefault();
          openAlert('Please enter a valid phone number (8-15 digits).', phoneInput);
          return;
        }
      }
    });
  </script>

@endpush