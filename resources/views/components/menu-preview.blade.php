@props(['categories'])

@php
    $previewCategories = $categories->filter(fn($c) => $c->layout !== 'lists')->values();
    $totalDishes = $categories->sum(fn($c) => $c->menuItems->count());
@endphp

<section x-data="{
    activeTab: '{{ $previewCategories->first()?->slug }}',
    categories: {{ Js::from($previewCategories->map(fn($c) => [
        'id' => $c->slug,
        'name' => $c->name,
        'items' => $c->menuItems->map(fn($i) => [
            'name' => $i->name,
            'price' => $i->price_label ?: ('$' . number_format($i->price, 0)),
            'desc' => $i->description ?: (is_array($i->tags) && count($i->tags) ? implode(' · ', $i->tags) : 'House favorite'),
            'img' => $i->image_url,
        ]),
    ])) }}
}"
class="relative overflow-hidden bg-paper py-20 sm:py-28">
    <div class="mx-auto max-w-6xl px-5 sm:px-8">
        <!-- Section Title & Meta -->
        <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="label-caps text-saffron">Fairbanks · Alaska</p>
                <h2 class="mt-4 font-display text-5xl leading-[0.95] text-ember sm:text-6xl">
                    Our menu
                </h2>
            </div>
            <p class="max-w-xs text-[11px] uppercase leading-relaxed tracking-[0.16em] text-ink/45">
                {{ $totalDishes }} dishes and pours
                <span class="mt-1 block text-ink/30">Appetizers · Curries · Thali · Wine · Beer</span>
            </p>
        </div>

        <!-- Scrollable Category Tabs Bar -->
        <div class="mt-10 -mx-5 flex gap-2 overflow-x-auto border-b border-terracotta/15 px-5 sm:mx-0 sm:px-0 [scrollbar-width:none]">
            <template x-for="cat in categories" :key="cat.id">
                <button type="button"
                        @click="activeTab = cat.id"
                        class="relative shrink-0 px-4 pb-4 pt-2 text-[10px] uppercase tracking-[0.18em] transition-colors duration-300"
                        :class="activeTab === cat.id ? 'text-terracotta font-medium' : 'text-ink/40 hover:text-terracotta/70'">
                    <span x-text="cat.name"></span>
                    <span x-show="activeTab === cat.id"
                          class="absolute inset-x-2 -bottom-px h-[2px] bg-saffron transition-all duration-300"></span>
                </button>
            </template>
        </div>

        <!-- Active Category Items Preview (Up to 6 items) -->
        <template x-for="cat in categories" :key="cat.id">
            <div x-show="activeTab === cat.id"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="mt-4">
                <div class="grid gap-x-12 md:grid-cols-2">
                    <template x-for="(item, idx) in cat.items.slice(0, 6)" :key="item.name">
                        <div class="group flex items-center gap-4 border-b border-dashed border-ink/10 py-4">
                            <div class="h-14 w-14 shrink-0 overflow-hidden rounded-full ring-1 ring-ink/5 transition-transform duration-500 group-hover:scale-105 sm:h-16 sm:w-16">
                                <img :src="item.img" :alt="item.name" class="h-full w-full object-cover" />
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-baseline justify-between gap-3">
                                    <h3 class="truncate text-[14px] font-semibold text-ember" x-text="item.name"></h3>
                                    <span class="shrink-0 text-[13px] font-semibold text-terracotta" x-text="item.price"></span>
                                </div>
                                <p class="mt-1 line-clamp-1 text-xs text-ink/55" x-text="item.desc"></p>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- More items indicator if > 6 -->
                <div x-show="cat.items.length > 6" class="mt-4">
                    <p class="text-[10px] uppercase tracking-[0.18em] text-ink/35">
                        + <span x-text="cat.items.length - 6"></span> more in <span x-text="cat.name.toLowerCase()"></span>
                    </p>
                </div>
            </div>
        </template>

        <!-- CTA to Full Menu Page -->
        <a href="{{ route('menu') }}"
           class="group mt-10 inline-flex items-center gap-3 rounded-full bg-terracotta px-8 py-4 text-[10px] uppercase tracking-[0.22em] text-paper transition-all duration-300 hover:bg-ink">
            <span>View the full menu</span>
            <svg class="h-3.5 w-3.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>
</section>
