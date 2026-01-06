@extends('layouts.user')

@section('title', 'Warung Salsabila - Menu')

@section('content')
    <div class="max-w-5xl mx-auto bg-white shadow-2xl min-h-screen w-full">
    <header class="bg-white relative">
        <!-- Banner Image with curved bottom -->
        <div class="relative overflow-hidden">
            <div class="curve-bottom bg-cover bg-center h-32" style="background-image: url('/images/1_banner.webp');"></div>
        </div>

        <!-- Logo & Title Section -->
        <div class="px-6 -mt-16 relative z-10 pb-4">
            <div class="flex items-start justify-between gap-4">
                <div class="flex items-start gap-3">
                    <div class="h-20 w-20 bg-white rounded-3xl shadow-xl flex items-center justify-center flex-shrink-0 border-4 border-white">
                        <img src="/images/2_profil_warung.jpg" alt="Profil Warung" class="h-full w-full object-cover rounded-3xl">
                    </div>
                    <div class="mt-2">
                        <h1 class="text-xl font-bold text-gray-900 leading-tight" style="text-shadow: 0 0 8px rgba(255, 255, 255, 0.8);">Warung Salsabila</h1>
                        <div class="flex items-center gap-2 mt-1.5">
                            <span id="store-status" class="inline-flex items-center gap-1.5 text-[11px] px-2 py-0.5 rounded-full border">
                                <span id="store-status-dot" class="h-1.5 w-1.5 rounded-full"></span>
                                <span id="store-status-text" class="font-semibold">Open</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-2 mt-2">
                    <a href="https://wa.me/6281389752975" class="h-9 w-9 rounded-lg border border-gray-300 bg-white hover:bg-gray-50 flex items-center justify-center transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.94 14.56L2 22l5.56-1.06A10 10 0 1 0 12 2Zm0 2a8 8 0 1 1 0 16 7.86 7.86 0 0 1-4.13-1.19l-.29-.17-3 .57.57-3-.17-.29A7.86 7.86 0 0 1 4 12a8 8 0 0 1 8-8Zm4.86 10.55c-.26-.13-1.52-.75-1.76-.83s-.41-.13-.58.13-.66.83-.82 1-.3.19-.56.06a6.52 6.52 0 0 1-1.92-1.19 7.22 7.22 0 0 1-1.33-1.64c-.14-.25 0-.38.11-.51s.25-.29.37-.45a1.71 1.71 0 0 0 .25-.43.49.49 0 0 0 0-.45c0-.13-.56-1.38-.77-1.89s-.41-.43-.57-.44h-.49a.94.94 0 0 0-.68.32A2.84 2.84 0 0 0 6 8.3 4.94 4.94 0 0 0 7 10.89a11.27 11.27 0 0 0 4.33 4.32 4.85 4.85 0 0 0 2.91.9 2.54 2.54 0 0 0 1.65-.52 2.08 2.08 0 0 0 .69-1.32c.05-.13 0-.24-.12-.32Z"/></svg>
                    </a>
                    <button id="btn-info" class="h-9 px-3 rounded-lg border border-gray-300 bg-white hover:bg-gray-50 flex items-center gap-1.5 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M11 10h2v7h-2zM11 7h2v2h-2z"/><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2m0 2a8 8 0 110 16 8 8 0 010-16"/></svg>
                        <span class="text-xs font-medium">Information</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Tabs - Outside header for proper sticky behavior -->
    <div class="sticky top-0 bg-white z-50 shadow-sm">
        <div class="px-6 py-2">
            <div class="flex items-center gap-2 border-b border-gray-200">
                <button id="btn-search" class="h-9 w-9 rounded-md border border-gray-300 bg-white grid place-content-center hover:bg-gray-50 flex-shrink-0 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3-3"/></svg>
                </button>
                <button id="btn-list" class="h-9 w-9 rounded-md border border-gray-300 bg-white grid place-content-center hover:bg-gray-50 flex-shrink-0 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <nav class="flex gap-6 overflow-x-auto flex-1 pb-0 scrollbar-hide">
                    <a href="#makanan" class="whitespace-nowrap px-0.5 py-3 border-b-2 border-blue-600 text-blue-600 text-sm font-bold uppercase tracking-wide">MAKANAN</a>
                    <a href="#minuman" class="whitespace-nowrap px-0.5 py-3 border-b-2 border-transparent text-gray-600 hover:text-gray-900 text-sm font-semibold uppercase tracking-wide">MINUMAN</a>
                    <a href="#tambahan" class="whitespace-nowrap px-0.5 py-3 border-b-2 border-transparent text-gray-600 hover:text-gray-900 text-sm font-semibold uppercase tracking-wide">TAMBAHAN</a>
                </nav>
                <button id="btn-cart" class="relative h-9 w-9 rounded-md border border-gray-300 bg-white grid place-content-center hover:bg-gray-50 flex-shrink-0 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M5 6h2l3.6 7.59a2 2 0 0 0 1.8 1.21H19a2 2 0 0 0 2-1.64l1-5A2 2 0 0 0 20 6H7"/></svg>
                    <span id="cart-badge" class="absolute -top-1 -right-1 hidden min-w-[18px] h-[18px] rounded-full bg-pink-600 text-white text-[11px] grid place-content-center px-1">0</span>
                </button>
            </div>
            <div id="search-bar" class="hidden mt-3 mb-3">
                <input id="search-input" type="text" placeholder="Search menu" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" />
            </div>
        </div>
    </div>

    <!-- Floating Cart Pill -->
    <div id="floating-cart" class="fixed bottom-6 right-6 hidden z-[90]">
        <button id="floating-cart-btn" class="px-4 py-2 rounded-full shadow-lg bg-sky-600 text-white hover:bg-sky-700">
            <span id="floating-cart-text">Cart (0) • Rp 0</span>
        </button>
    </div>

    <main class="px-6 pb-20 pt-6">
        <section id="makanan" class="scroll-mt-32">
            <h2 class="text-lg font-bold text-gray-900 mb-4 uppercase tracking-wide">MAKANAN</h2>
            <div class="grid grid-cols-2 gap-x-8 gap-y-6">
                @foreach($makanan as $item)
                <div class="cursor-pointer hover:bg-gray-50 -mx-2 px-2 py-2 rounded-lg transition-colors btn-open-item"
                    data-name="{{ $item->name }}" data-price="{{ $item->price }}" 
                    data-image="{{ str_starts_with($item->image, 'images/') ? asset($item->image) : asset('storage/' . $item->image) }}">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 text-base leading-tight">{{ $item->name }}</h3>
                            <p class="text-sm text-gray-900 font-medium mt-1">Rp {{ number_format($item->price,0,',','.') }}</p>
                        </div>
                        <img src="{{ str_starts_with($item->image, 'images/') ? asset($item->image) : asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="h-16 w-16 rounded-lg object-cover flex-shrink-0">
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <section id="minuman" class="mt-12 scroll-mt-32">
            <h2 class="text-lg font-bold text-gray-900 mb-4 uppercase tracking-wide">MINUMAN</h2>
            <div class="grid grid-cols-2 gap-x-8 gap-y-6">
                @foreach($minuman as $item)
                <div class="cursor-pointer hover:bg-gray-50 -mx-2 px-2 py-2 rounded-lg transition-colors btn-open-item"
                    data-name="{{ $item->name }}" data-price="{{ $item->price }}" 
                    data-image="{{ str_starts_with($item->image, 'images/') ? asset($item->image) : asset('storage/' . $item->image) }}">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 text-base leading-tight">{{ $item->name }}</h3>
                            <p class="text-sm text-gray-900 font-medium mt-1">Rp {{ number_format($item->price,0,',','.') }}</p>
                        </div>
                        <img src="{{ str_starts_with($item->image, 'images/') ? asset($item->image) : asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="h-16 w-16 rounded-lg object-cover flex-shrink-0">
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <section id="tambahan" class="mt-12 scroll-mt-32">
            <h2 class="text-lg font-bold text-gray-900 mb-4 uppercase tracking-wide">TAMBAHAN</h2>
            <div class="grid grid-cols-2 gap-x-8 gap-y-6">
                @foreach($tambahan as $item)
                <div class="cursor-pointer hover:bg-gray-50 -mx-2 px-2 py-2 rounded-lg transition-colors btn-open-item"
                    data-name="{{ $item->name }}" data-price="{{ $item->price }}" 
                    data-image="{{ str_starts_with($item->image, 'images/') ? asset($item->image) : asset('storage/' . $item->image) }}">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 text-base leading-tight">{{ $item->name }}</h3>
                            <p class="text-sm text-gray-900 font-medium mt-1">Rp {{ number_format($item->price,0,',','.') }}</p>
                        </div>
                        <img src="{{ str_starts_with($item->image, 'images/') ? asset($item->image) : asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="h-16 w-16 rounded-lg object-cover flex-shrink-0">
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </main>
    </div>

    <div id="modal-info" class="fixed inset-0 hidden items-center justify-center bg-black/40 p-4 z-[100]">
        <div class="w-full max-w-2xl rounded-2xl bg-white shadow-xl max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h3 class="font-semibold">Information</h3>
                <button id="btn-close" class="h-8 w-8 grid place-content-center rounded-md hover:bg-gray-100">✕</button>
            </div>
            <div class="px-6 py-4 space-y-4 text-sm">
                <div class="flex items-center gap-2">
                    <span id="store-status-modal" class="inline-flex items-center gap-1 text-xs px-2 py-0.5 rounded-full border">
                        <span id="store-status-modal-dot" class="h-2 w-2 rounded-full"></span>
                        <span id="store-status-modal-text">Open</span>
                    </span>
                </div>
                <p class="font-medium text-base">Warung Salsabila</p>
                <div class="space-y-3">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 21s-6-4.35-6-10a6 6 0 1 1 12 0c0 5.65-6 10-6 10z"/><circle cx="12" cy="11" r="2"/></svg>
                        <div>
                            <div>Jl. Sukabirus No.F48, Citeureup, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40258</div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="font-medium">Types of service</div>
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center justify-between rounded-lg border px-3 py-2">
                            <div class="flex items-center gap-2"><span class="text-gray-700">Delivery</span></div>
                            <span class="text-sky-600">✓</span>
                        </div>
                        <div class="flex items-center justify-between rounded-lg border px-3 py-2">
                            <div class="flex items-center gap-2"><span class="text-gray-700">Take Away</span></div>
                            <span class="text-sky-600">✓</span>
                        </div>
                        <div class="flex items-center justify-between rounded-lg border px-3 py-2">
                            <div class="flex items-center gap-2"><span class="text-gray-700">On Site</span></div>
                            <span class="text-sky-600">✓</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="font-medium">Hours of operation</div>
                    <div class="mt-2 grid grid-cols-1 gap-1">
                        <div class="flex items-center justify-between rounded-lg border px-3 py-2">
                            <div class="text-gray-700 font-medium">Monday</div>
                            <div class="text-gray-700">8.00 am–8.00 pm</div>
                        </div>
                        <div class="flex items-center justify-between rounded-lg border px-3 py-2">
                            <div class="text-gray-700">Tuesday</div>
                            <div class="text-gray-700">8.00 am–8.00 pm</div>
                        </div>
                        <div class="flex items-center justify-between rounded-lg border px-3 py-2">
                            <div class="text-gray-700">Wednesday</div>
                            <div class="text-gray-700">8.00 am–8.00 pm</div>
                        </div>
                        <div class="flex items-center justify-between rounded-lg border px-3 py-2">
                            <div class="text-gray-700">Thursday</div>
                            <div class="text-gray-700">8.00 am–8.00 pm</div>
                        </div>
                        <div class="flex items-center justify-between rounded-lg border px-3 py-2">
                            <div class="text-gray-700">Friday</div>
                            <div class="text-gray-700">8.00 am–8.00 pm</div>
                        </div>
                        <div class="flex items-center justify-between rounded-lg border px-3 py-2">
                            <div class="text-gray-700">Saturday</div>
                            <div class="text-gray-500">Closed</div>
                        </div>
                        <div class="flex items-center justify-between rounded-lg border px-3 py-2">
                            <div class="text-gray-700">Sunday</div>
                            <div class="text-gray-700">8.00 am–8.00 pm</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 border-t flex justify-end gap-2">
                <a href="https://wa.me/6281389752975" class="px-4 py-2 rounded-md bg-green-600 text-white hover:bg-green-700">WhatsApp</a>
                <button id="btn-ok" class="px-4 py-2 rounded-md bg-sky-600 text-white hover:bg-sky-700">Close</button>
            </div>
        </div>
    </div>

    <div id="drawer-backdrop" class="fixed inset-0 hidden bg-black/40 z-[60] transition-opacity"></div>
    <aside id="drawer" class="fixed inset-y-0 left-0 w-72 max-w-[85vw] -translate-x-full bg-white shadow-2xl transition-transform duration-300 ease-out z-[70]">
        <div class="flex items-center justify-between px-4 py-4 border-b bg-white">
            <div class="font-bold text-lg text-gray-900">Categories</div>
            <button id="drawer-close" class="h-9 w-9 grid place-content-center rounded-lg hover:bg-gray-100 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="overflow-y-auto h-[calc(100vh-65px)]">
            @php $cats = [
                ['MAKANAN', $makanan->count(), '#makanan'],
                ['MINUMAN', $minuman->count(), '#minuman'],
                ['TAMBAHAN', $tambahan->count(), '#tambahan'],
            ]; @endphp
            @foreach($cats as $c)
            <a href="{{ $c[2] }}" class="drawer-link block px-5 py-4 hover:bg-gray-50 border-b border-gray-100 transition-colors">
                <div class="font-semibold text-gray-900 text-base">{{ $c[0] }}</div>
                <div class="mt-0.5 text-xs text-gray-500">{{ $c[1] }} products</div>
            </a>
            @endforeach
        </div>
    </aside>

    <!-- Cart Drawer Right -->
    <aside id="cart-drawer" class="fixed inset-y-0 right-0 w-80 max-w-[85vw] translate-x-full bg-white shadow-2xl transition-transform duration-300 ease-out z-[75] flex flex-col">
        <div class="flex items-center justify-between px-4 py-4 border-b bg-white flex-shrink-0">
            <div class="font-bold text-lg text-gray-900">Cart</div>
            <button id="cart-close" class="h-9 w-9 grid place-content-center rounded-lg hover:bg-gray-100 transition-colors">✕</button>
        </div>
        <div class="flex-1 overflow-y-auto p-4" id="cart-items"></div>
        <div class="border-t p-4 bg-white flex-shrink-0">
            <div class="flex items-center justify-between mb-3">
                <div class="text-sm text-gray-600">Total</div>
                <div id="cart-total" class="font-semibold">Rp 0</div>
            </div>
            <button id="btn-checkout" class="w-full px-4 py-2 rounded-md bg-green-600 text-white hover:bg-green-700">Checkout</button>
        </div>
    </aside>

    <div id="modal-item" class="fixed inset-0 hidden items-center justify-center bg-black/40 p-4 z-[100]">
        <div class="w-full max-w-3xl rounded-2xl bg-white shadow-xl overflow-hidden">
            <div class="flex justify-between items-center px-5 py-4 border-b">
                <h3 id="item-title" class="font-semibold">Item</h3>
                <button id="item-close" class="h-8 w-8 grid place-content-center rounded-md hover:bg-gray-100">✕</button>
            </div>
            <div class="grid md:grid-cols-2 gap-6 p-5">
                <img id="item-image" src="" alt="item" class="w-full h-64 object-cover rounded-xl">
                <div>
                    <p id="item-price" class="text-sm text-gray-600">Rp 0</p>
                    <label class="block text-sm font-medium mt-4">Comments</label>
                    <div class="mt-1 relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        </span>
                        <input id="item-notes" type="text" placeholder="(Optional)" class="pl-12 w-full rounded-md border-gray-300 focus:ring-sky-600 focus:border-sky-600">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Any special requests or notes for your order.</p>
                    <div class="mt-6 flex items-center gap-3">
                        <div class="inline-flex items-center border rounded-md overflow-hidden">
                            <button id="qty-dec" class="px-3 py-2 hover:bg-gray-50">-</button>
                            <input id="qty" value="1" class="w-12 text-center border-x outline-none"/>
                            <button id="qty-inc" class="px-3 py-2 hover:bg-gray-50">+</button>
                        </div>
                        <button id="btn-add-item" class="flex-1 px-4 py-2 rounded-md bg-sky-600 text-white hover:bg-sky-700">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        const btnInfo = document.getElementById('btn-info');
        const modal = document.getElementById('modal-info');
        const btnClose = document.getElementById('btn-close');
        const btnOk = document.getElementById('btn-ok');
        const btnSearch = document.getElementById('btn-search');
        const searchBar = document.getElementById('search-bar');
        const btnList = document.getElementById('btn-list');
        const drawer = document.getElementById('drawer');
        const drawerClose = document.getElementById('drawer-close');
        const drawerBackdrop = document.getElementById('drawer-backdrop');
        function openModal(){ modal.classList.remove('hidden'); modal.classList.add('flex'); }
        function closeModal(){ modal.classList.add('hidden'); modal.classList.remove('flex'); }
        btnInfo?.addEventListener('click', openModal);
        btnClose?.addEventListener('click', closeModal);
        btnOk?.addEventListener('click', closeModal);
        modal?.addEventListener('click', (e)=>{ if(e.target===modal) closeModal(); });
        // search bar toggle + focus
        const searchInput = document.getElementById('search-input');
        btnSearch?.addEventListener('click', ()=>{
            const wasHidden = searchBar.classList.contains('hidden');
            searchBar.classList.toggle('hidden');
            if (wasHidden) {
                setTimeout(()=> searchInput?.focus(), 0);
            }
        });
        // store open/close logic
        const storeSchedule = {
            0: { open: '08:00', close: '20:00' }, // Sunday
            1: { open: '08:00', close: '20:00' },
            2: { open: '08:00', close: '20:00' },
            3: { open: '08:00', close: '20:00' },
            4: { open: '08:00', close: '20:00' },
            5: { open: '08:00', close: '20:00' },
            6: null // Saturday closed
        };
        function parseHHMM(s){ const [h,m] = s.split(':').map(Number); return h*60 + m; }
        function isOpenNow(){
            const now = new Date();
            const sched = storeSchedule[now.getDay()];
            if(!sched) return false;
            const mins = now.getHours()*60 + now.getMinutes();
            return mins >= parseHHMM(sched.open) && mins < parseHHMM(sched.close);
        }
        function applyStatus(elId, dotId, textId, open){
            const el = document.getElementById(elId);
            const dot = document.getElementById(dotId);
            const t = document.getElementById(textId);
            if(!el || !dot || !t) return;
            el.classList.remove('text-green-700','bg-green-50','border-green-200','text-gray-700','bg-gray-100','border-gray-300');
            dot.classList.remove('bg-green-600','bg-gray-500');
            if (open) {
                el.classList.add('text-green-700','bg-green-50','border-green-200');
                dot.classList.add('bg-green-600');
                t.textContent = 'Open';
            } else {
                el.classList.add('text-gray-700','bg-gray-100','border-gray-300');
                dot.classList.add('bg-gray-500');
                t.textContent = 'Closed';
            }
        }
        function updateStoreStatus(){
            const open = isOpenNow();
            applyStatus('store-status','store-status-dot','store-status-text', open);
            applyStatus('store-status-modal','store-status-modal-dot','store-status-modal-text', open);
        }
        updateStoreStatus();
        setInterval(updateStoreStatus, 60000);

        // live search filter
        const allCards = Array.from(document.querySelectorAll('.btn-open-item'));
        function filterCards(q){
            const query = (q || '').trim().toLowerCase();
            let firstMatch = null;
            allCards.forEach(card=>{
                const titleEl = card.querySelector('h3');
                const title = (titleEl?.textContent || '').toLowerCase();
                const isMatch = !query || title.includes(query);
                card.classList.toggle('hidden', !isMatch);
                if (isMatch && !firstMatch) firstMatch = card;
            });
            return firstMatch;
        }
        searchInput?.addEventListener('input', (e)=>{
            filterCards(e.target.value);
        });
        // Enter to jump to first result
        searchInput?.addEventListener('keydown', (e)=>{
            if(e.key === 'Enter'){
                const first = filterCards(searchInput.value);
                if(first){ first.scrollIntoView({ behavior: 'smooth', block: 'center' }); }
            }
        });
        // drawer logic
        function openDrawer(){
            console.log('Opening drawer');
            drawer.classList.remove('-translate-x-full');
            drawer.classList.add('translate-x-0');
            drawerBackdrop.classList.remove('hidden');
            drawerBackdrop.classList.add('block');
            document.body.classList.add('overflow-hidden');
        }
        function closeDrawer(){
            console.log('Closing drawer');
            drawer.classList.remove('translate-x-0');
            drawer.classList.add('-translate-x-full');
            drawerBackdrop.classList.remove('block');
            drawerBackdrop.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        btnList?.addEventListener('click', (e) => {
            console.log('Hamburger clicked');
            openDrawer();
        });
        drawerClose?.addEventListener('click', closeDrawer);
        drawerBackdrop?.addEventListener('click', ()=>{
            const isDrawerOpen = drawer.classList.contains('translate-x-0');
            const isCartOpen = cartDrawer?.classList.contains('translate-x-0');
            if (isDrawerOpen) closeDrawer();
            if (isCartOpen) closeCart();
        });
        // close drawer when a category is selected
        document.querySelectorAll('.drawer-link').forEach(link=>{
            link.addEventListener('click', (e)=>{
                e.preventDefault();
                const target = link.getAttribute('href');
                closeDrawer();
                const el = document.querySelector(target);
                if (el) {
                    setTimeout(()=>{
                        el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        try { history.replaceState(null, '', target); } catch(_) {}
                    }, 200);
                }
            });
        });
        // ESC closes active UI (drawer or modals)
        document.addEventListener('keydown', (e)=>{
            if(e.key === 'Escape'){
                if(!modal.classList.contains('hidden')) closeModal();
                if(!itemModal.classList.contains('hidden')) closeItem();
                const isDrawerOpen = drawer.classList.contains('translate-x-0');
                const isCartOpen = cartDrawer?.classList.contains('translate-x-0');
                if(isDrawerOpen) closeDrawer();
                if(isCartOpen) closeCart();
            }
        });

        // Tab navigation active state
        const navLinks = document.querySelectorAll('nav a');
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                navLinks.forEach(l => {
                    l.classList.remove('border-blue-600', 'text-blue-600');
                    l.classList.add('border-transparent', 'text-gray-700');
                });
                link.classList.remove('border-transparent', 'text-gray-700');
                link.classList.add('border-blue-600', 'text-blue-600');
            });
        });

        // Item modal logic
        const itemModal = document.getElementById('modal-item');
        const itemClose = document.getElementById('item-close');
        const itemTitle = document.getElementById('item-title');
        const itemImage = document.getElementById('item-image');
        const itemPrice = document.getElementById('item-price');
        const qtyInput = document.getElementById('qty');
        const qtyInc = document.getElementById('qty-inc');
        const qtyDec = document.getElementById('qty-dec');
        const btnAddItem = document.getElementById('btn-add-item');
        const btnCart = document.getElementById('btn-cart');
        const cartBadge = document.getElementById('cart-badge');
        const floatingCart = document.getElementById('floating-cart');
        const floatingCartBtn = document.getElementById('floating-cart-btn');
        const cartDrawer = document.getElementById('cart-drawer');
        const cartClose = document.getElementById('cart-close');
        const cartItems = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        let currentPrice = 0;

        function formatRupiah(num){
            return 'Rp ' + Number(num).toLocaleString('id-ID');
        }
        function openItem(name, price, image){
            currentPrice = Number(price);
            itemTitle.textContent = name;
            itemImage.src = image;
            qtyInput.value = 1;
            document.getElementById('item-notes').value = '';
            itemPrice.textContent = formatRupiah(price);
            btnAddItem.textContent = 'Add ' + formatRupiah(price);
            itemModal.classList.remove('hidden');
            itemModal.classList.add('flex');
        }
        function closeItem(){
            itemModal.classList.add('hidden');
            itemModal.classList.remove('flex');
            document.getElementById('item-notes').value = '';
        }
        function updateTotal(){
            const q = Math.max(1, parseInt(qtyInput.value || '1'));
            btnAddItem.textContent = 'Add ' + formatRupiah(q * currentPrice);
        }

        // Cart state and UI
        const cart = [];
        function calcTotal(){ return cart.reduce((s,i)=> s + i.price * i.qty, 0); }
        function updateCartUI(){
            const count = cart.reduce((s,i)=> s + i.qty, 0);
            if (cartBadge) {
                cartBadge.textContent = String(count);
                cartBadge.classList.toggle('hidden', count === 0);
            }
            const pillText = document.getElementById('floating-cart-text');
            if (floatingCart) {
                if (count > 0) {
                    floatingCart.classList.remove('hidden');
                    if (pillText) pillText.textContent = `Cart (${count}) • ${formatRupiah(calcTotal())}`;
                } else {
                    floatingCart.classList.add('hidden');
                }
            }
            if (cartItems) {
                cartItems.innerHTML = cart.map((it, idx)=> `
                    <div class="flex items-center gap-3 py-3 border-b">
                        <div class="flex-1 min-w-0">
                            <div class="font-medium text-gray-900 truncate">${it.name}</div>
                            ${it.comments ? `<div class="text-sm text-gray-600 italic mt-1">"${it.comments}"</div>` : ''}
                            <div class="flex items-center justify-between mt-1">
                                <div class="text-sm text-gray-500">${it.qty} × ${formatRupiah(it.price)}</div>
                                <div class="font-semibold text-gray-900">${formatRupiah(it.qty * it.price)}</div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <button data-i="${idx}" class="px-2 py-1 rounded border text-sm font-medium hover:bg-gray-50 qty-inc">+</button>
                            <button data-i="${idx}" class="px-2 py-1 rounded border text-sm font-medium hover:bg-gray-50 qty-dec">−</button>
                            <button data-i="${idx}" class="px-2 py-1 rounded border text-red-600 text-sm font-medium hover:bg-red-50 remove">×</button>
                        </div>
                    </div>
                `).join('');
                cartItems.querySelectorAll('.qty-inc').forEach(btn=>{
                    btn.addEventListener('click', ()=>{ const i = Number(btn.getAttribute('data-i')); cart[i].qty += 1; updateCartUI(); });
                });
                cartItems.querySelectorAll('.qty-dec').forEach(btn=>{
                    btn.addEventListener('click', ()=>{ const i = Number(btn.getAttribute('data-i')); cart[i].qty = Math.max(1, cart[i].qty - 1); updateCartUI(); });
                });
                cartItems.querySelectorAll('.remove').forEach(btn=>{
                    btn.addEventListener('click', ()=>{ const i = Number(btn.getAttribute('data-i')); cart.splice(i,1); updateCartUI(); });
                });
            }
            if (cartTotal) cartTotal.textContent = formatRupiah(calcTotal());
        }
        function addToCart(name, price, image, qty, comments = ''){
            const existing = cart.find(it=> it.name === name && it.comments === comments);
            if (existing) existing.qty += Number(qty);
            else cart.push({ name, price: Number(price), image, qty: Number(qty), comments });
            updateCartUI();
        }
        function openCart(){
            cartDrawer.classList.remove('translate-x-full');
            cartDrawer.classList.add('translate-x-0');
            drawerBackdrop.classList.remove('hidden');
            drawerBackdrop.classList.add('block');
            document.body.classList.add('overflow-hidden');
            // Hide floating cart button when cart drawer is open
            if (floatingCart) {
                floatingCart.classList.add('hidden');
            }
        }
        function closeCart(){
            cartDrawer.classList.remove('translate-x-0');
            cartDrawer.classList.add('translate-x-full');
            drawerBackdrop.classList.remove('block');
            drawerBackdrop.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            // Show floating cart button when cart drawer is closed
            const count = cart.reduce((s,i)=> s + i.qty, 0);
            if (floatingCart && count > 0) {
                floatingCart.classList.remove('hidden');
            }
        }
        btnCart?.addEventListener('click', openCart);
        floatingCartBtn?.addEventListener('click', openCart);
        cartClose?.addEventListener('click', closeCart);

        document.querySelectorAll('.btn-open-item').forEach(card=>{
            card.addEventListener('click', (e)=>{
                e.preventDefault();
                openItem(card.dataset.name, card.dataset.price, card.dataset.image);
            })
        });
        itemModal?.addEventListener('click', (e)=>{ if(e.target===itemModal) closeItem(); });
        itemClose?.addEventListener('click', closeItem);
        qtyInc?.addEventListener('click', ()=>{ qtyInput.value = Number(qtyInput.value||1)+1; updateTotal(); });
        qtyDec?.addEventListener('click', ()=>{ qtyInput.value = Math.max(1, Number(qtyInput.value||1)-1); updateTotal(); });
        qtyInput?.addEventListener('input', updateTotal);
        btnAddItem?.addEventListener('click', ()=>{
            const q = Math.max(1, parseInt(qtyInput.value || '1'));
            const comments = document.getElementById('item-notes').value || '';
            addToCart(itemTitle.textContent, currentPrice, itemImage.src, q, comments);
            closeItem();
        });
        document.getElementById('btn-checkout')?.addEventListener('click', async ()=>{
            const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            try {
                await fetch('/cart/save', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                    body: JSON.stringify({ items: cart })
                });
            } catch (e) { console.warn('Failed to save cart', e); }
            window.location.href = '/checkout';
        });
    </script>
@endpush


