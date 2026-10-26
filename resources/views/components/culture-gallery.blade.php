<div class="mx-auto mt-16 max-w-[92rem] px-5 sm:mt-20 sm:px-8">
    <div class="flex flex-col gap-4 border-t border-terracotta/15 pt-10 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="label-caps text-saffron">Inside Hari Om</p>
            <h3 class="mt-3 font-display text-3xl leading-tight text-ember sm:text-4xl">
                A little piece of India<span class="italic text-terracotta"> in Fairbanks</span>
            </h3>
        </div>
        <p class="max-w-sm text-xs leading-relaxed text-ink/55">
            Hand-painted walls, brass and marigolds, fabric lanterns glowing over the tables — the room is part of the meal.
        </p>
    </div>

    <div class="mt-8 grid gap-4 sm:grid-cols-3 sm:gap-5">
        <!-- Figure 1 -->
        <figure class="group">
            <div class="aspect-[4/3] overflow-hidden rounded-sm bg-[#f2ede4]">
                <img src="{{ asset('images/cultureShrine.jpg') }}"
                     alt="Ganesh, fresh flowers and a hand-painted Om on the green wall — the heart of our dining room."
                     class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-[1.03]" />
            </div>
            <figcaption class="mt-4">
                <p class="text-[9px] uppercase tracking-[0.22em] text-terracotta/70">The shrine</p>
                <p class="mt-2 text-xs leading-relaxed text-ink/55">
                    Ganesh, fresh flowers and a hand-painted Om on the green wall — the heart of our dining room.
                </p>
            </figcaption>
        </figure>

        <!-- Figure 2 -->
        <figure class="group">
            <div class="aspect-[4/3] overflow-hidden rounded-sm bg-[#f2ede4]">
                <img src="{{ asset('images/cultureBooths.jpg') }}"
                     alt="Burgundy booths under our Alaska mural, hung with fabric lanterns and fairy lights."
                     class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-[1.03]" />
            </div>
            <figcaption class="mt-4">
                <p class="text-[9px] uppercase tracking-[0.22em] text-terracotta/70">Booths & murals</p>
                <p class="mt-2 text-xs leading-relaxed text-ink/55">
                    Burgundy booths under our Alaska mural, hung with fabric lanterns and fairy lights.
                </p>
            </figcaption>
        </figure>

        <!-- Figure 3 -->
        <figure class="group">
            <div class="aspect-[4/3] overflow-hidden rounded-sm bg-[#f2ede4]">
                <img src="{{ asset('images/cultureExterior.jpg') }}"
                     alt="Up the red stairs on South Cushman Street — look for the Om and the gold drapes."
                     class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-[1.03]" />
            </div>
            <figcaption class="mt-4">
                <p class="text-[9px] uppercase tracking-[0.22em] text-terracotta/70">Our door on Cushman</p>
                <p class="mt-2 text-xs leading-relaxed text-ink/55">
                    Up the red stairs on South Cushman Street — look for the Om and the gold drapes.
                </p>
            </figcaption>
        </figure>
    </div>
</div>
