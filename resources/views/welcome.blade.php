@extends('layouts.public')

@section('content')

    {{-- =========================================================
         HERO
    ========================================================= --}}
    <section class="relative min-h-screen flex flex-col items-center justify-center bg-cover bg-center bg-no-repeat"
             style="background-image: url({{ asset('images/adelitas_way_lubbock_tx.webp') }});">

        {{-- Cinematic gradient overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/30 to-black/90"></div>

        {{-- Content --}}
        <div class="relative z-10 flex flex-col items-center text-center px-6 gap-8 pt-20">
            <img src="{{ asset('images/adelitas_way_logo.webp') }}"
                 alt="Adelitas Way"
                 style="filter: invert(1);"
                 class="w-72 sm:w-96 max-w-full object-contain drop-shadow-2xl">

            <p class="text-white text-shadow text-xs tracking-[0.4em] uppercase">1 Billion Streams &amp; Counting</p>

            <div class="flex flex-wrap gap-4 justify-center mt-2">
                <a href="https://ffm.to/xbr6k5v" target="_blank" class="btn-primary">
                    Listen Now
                </a>
                <a href="https://adelitaswaymerch.bigcartel.com/" class="btn-outline">
                    Merch &amp; Vinyl
                </a>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce">
            <svg class="w-5 h-5 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>
    </section>

    {{-- =========================================================
         ABOUT
    ========================================================= --}}
    <section id="about" class="relative py-28 bg-[#080808]">

        {{-- Leather texture at low opacity --}}
        <div class="absolute inset-0 opacity-15"
             style="background-image: url('/images/leather_texture.webp'); background-repeat: repeat; background-size: 400px;"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-12">

            {{-- Section header --}}
            <div class="mb-16 text-center">
                <p class="section-overline">Est. 2006 &bull; Las Vegas, NV</p>
                <h2 class="section-heading">The Band</h2>
                <div class="section-divider mx-auto"></div>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-3 gap-6 mb-20 max-w-xl mx-auto">
                <div class="text-center">
                    <div class="text-[#7BBEFD] leading-none mb-1" style="font-family: 'Bebas Neue', sans-serif; font-size: clamp(2rem, 5vw, 3.5rem);">1B+</div>
                    <div class="text-white/65 text-xs tracking-[0.2em] uppercase">Streams</div>
                </div>
                <div class="text-center border-x border-white/10">
                    <div class="text-[#7BBEFD] leading-none mb-1" style="font-family: 'Bebas Neue', sans-serif; font-size: clamp(2rem, 5vw, 3.5rem);">8</div>
                    <div class="text-white/65 text-xs tracking-[0.2em] uppercase">Albums</div>
                </div>
                <div class="text-center">
                    <div class="text-[#7BBEFD] leading-none mb-1" style="font-family: 'Bebas Neue', sans-serif; font-size: clamp(2rem, 5vw, 3.5rem);">20+</div>
                    <div class="text-white/65 text-xs tracking-[0.2em] uppercase">Years</div>
                </div>
            </div>

            {{-- Photo + bio --}}
            <div class="flex flex-col gap-10">

                <div class="relative">
                    <img src="{{ asset('images/adelitas_way_bozeman.JPG') }}"
                         alt="Adelitas Way"
                         class="w-full h-[340px] sm:h-[420px] lg:h-[500px] object-cover object-center shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                </div>

                <div class="flex flex-col justify-start max-w-3xl">
                    <h4 class="text-[#7BBEFD] text-base tracking-[0.3em] mb-6 uppercase">Bio</h4>

                    <p class="text-gray-300 leading-relaxed mb-4 text-sm">Adelitas Way formed in 2006 and quickly created a massive buzz in their hometown Las Vegas music scene, by consistently selling out shows left and right. Fronted by lead singer/songwriter Rick Dejesus, and joined by drummer Trevor Stafford and bassist Andrew Cushing, they signed to Virgin Records and broke into the mainstream with their anthemic song Invincible from their self-titled debut album.</p>

                    <p class="text-gray-300 leading-relaxed mb-4 text-sm">Invincible was a top 5 single at Active Rock Radio and paved the way for them with numerous television spots, including the CSI Miami finale, it served as the theme song for the weekly WWE Superstars show, was featured in the THQ video game Raw vs Smackdown, and also used on Fox Sports Network as the college football theme song. Additionally, it was featured on ESPN Monday night football, and on Fox (MLB playoffs), and the track went on to become Certified Gold.</p>

                    <div id="moreText" class="overflow-hidden transition-[max-height] duration-500 ease-out max-h-0">
                        <p class="text-gray-300 leading-relaxed mb-4 text-sm">The band's follow up sophomore effort, Home School Valedictorian, arrived in Summer 2011, spawning four Top 5 Active Rock Radio singles (Sick, The Collapse, Criticize, and Alive, two of which went to #1 (Alive and Criticize). The band performed Alive on ABC's The Bachelor Pad on national television. This album cycle marked the band going on to do the Carnival Of Madness tour in 2011 with the likes of Theory Of A Deadman, Alter Bridge and Black Stone Cherry, as well as being on the mainstage on Uproar Fest 2012 with their peers in Shinedown, Godsmack, Papa Roach and Staind. The record marks the band's highest selling album to date, having sold over 250,000 copies, over 1.5 Million iTunes singles, and has gathered over 150 million streams across DSPS.</p>
                        <p class="text-gray-300 leading-relaxed mb-4 text-sm">Adelitas Way third album Stuck was released in Summer 2014, and had a Top 5 radio single with Dog on a Leash. The track We Came was later used as ESPN Monday Night Football theme song. After the Stuck album cycle, the band's next record Getaway showed the band leaving Virgin Records and becoming fully independent. The band released the hit single Bad Reputation and the track went to #6 at the Active Rock Radio charts. Adelitas Way then embarked on their biggest headlining tour to date in support of the release; selling out over half the venues on a 40+ date trek across the United States. The band's single Ready for War (Pray For Peace) released on Sept 30th 2017, and reached #18 at Active Rock Radio fully independently, and was also used as the official theme song of WWE PPV TLC. Notorious was released in 2017 and became one of the band's most successful singles, gaining over 75 million streams, and becoming the first independent Certified Gold record for the band.</p>
                        <p class="text-gray-300 leading-relaxed mb-4 text-sm">Today, the band's presence over the last two decades in the rock scene has certainly been felt as a force to be reckoned with - they have become proven industry veterans, with 8 full length albums under their belt, culminating in over 1 billion combined streams across their catalog. Throughout their career, the band has relentlessly toured and built up a strong live following, touring with the likes of Guns N Roses, Shinedown, Creed, Skillet, Three Days Grace, Halestorm, Breaking Benjamin, Staind, Alter Bridge, Theory of a Deadman, Skillet, 10 Years, Buckcherry, Hinder, Red, Flyleaf, The Pretty Reckless and more, as well as successfully headlining sold out venues throughout the country. They have played the mainstage at the biggest Rock festivals in America, such as Rock On The Range, Carolina Rebellion, Louder Than Life, Welcome To Rockville, Blue Ridge Rock Festival, RockFest in Cadott, WI, Rock USA, Sturgis Bike Rally, and many more. One thing is for certain - Adelitas Way is a massive independently successful rock act, and here to stay and pave the way for the future of rock and roll.</p>
                    </div>

                    <a href="#" id="readMore"
                       class="inline-flex items-center gap-2 text-[#7BBEFD] hover:text-white transition-colors text-xs tracking-[0.25em] uppercase mt-2 w-fit">
                        Read More
                        <svg id="readMoreArrow" class="w-3.5 h-3.5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================
         PHOTO STRIP
    ========================================================= --}}
    <div class="grid grid-cols-3 h-48 sm:h-64">
        <div class="bg-cover bg-center"
             style="background-image: url({{ asset('images/adelitas_way_rapid_city.webp') }});"></div>
        <div class="bg-cover bg-center"
             style="background-image: url({{ asset('images/adelitas_way_trio.webp') }});"></div>
        <div class="bg-cover bg-top"
             style="background-image: url({{ asset('images/adelitas_way_machine_shop.jpg') }});"></div>
    </div>

    {{-- =========================================================
         TOUR
    ========================================================= --}}
    <section id="tour" class="relative py-28 bg-[#050505]">

        <div class="absolute inset-0 opacity-10"
             style="background-image: url('/images/leather_texture.webp'); background-repeat: repeat; background-size: 400px;"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 lg:px-12">
            <div class="mb-14 text-center">
                <p class="section-overline">On The Road</p>
                <h2 class="section-heading">Tour Dates</h2>
                <div class="section-divider mx-auto"></div>
            </div>

            <script charset="utf-8" src="https://widget.bandsintown.com/main.min.js"></script>
            <a class="bit-widget-initializer"
               data-artist-name="Adelitas Way"
               data-display-local-dates="false"
               data-display-past-dates="false"
               data-auto-style="false"
               data-text-color="#f8f9fa"
               data-link-color="#7BBEFD"
               data-background-color="rgba(0,0,0,0)"
               data-display-limit="15"
               data-display-start-time="false"
               data-link-text-color="#ebecee"
               data-display-lineup="false"
               data-display-play-my-city="true"
               data-separator-color="rgba(124,124,124,0.15)"></a>
        </div>
    </section>

    {{-- =========================================================
         CONNECT / LISTEN
    ========================================================= --}}
    <section id="connect" class="relative py-28">

        {{-- Background photo with strong dark overlay --}}
        <div class="absolute inset-0 bg-cover bg-center"
             style="background-image: url('/images/adelitas_way_boseman_mt.webp');"></div>
        <div class="absolute inset-0 bg-black/80"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 lg:px-12">
            <div class="mb-14 text-center">
                <p class="section-overline">Music &amp; Community</p>
                <h2 class="section-heading">Stay Connected</h2>
                <div class="section-divider mx-auto"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-10 lg:gap-16">

                {{-- Listen --}}
                <div>
                    <h3 class="text-white text-base tracking-[0.3em] uppercase mb-5 pb-3 border-b border-white/20">Listen</h3>
                    <div class="space-y-2">
                        <a href="https://music.apple.com/us/artist/adelitas-way/314795012" target="_blank" class="platform-link">
                            <i class="fab fa-apple w-5 text-center text-[#7BBEFD] text-base"></i>
                            <span class="text-xs tracking-[0.2em] uppercase">Apple Music</span>
                        </a>
                        <a href="https://music.amazon.com/artists/B0028JGGPE/adelitas-way?marketplaceId=ATVPDKIKX0DER&musicTerritory=US&ref=dm_sh_1JZNSVZX5b4RXrS4jek0NCzh8" target="_blank" class="platform-link">
                            <i class="fab fa-amazon w-5 text-center text-[#7BBEFD] text-base"></i>
                            <span class="text-xs tracking-[0.2em] uppercase">Amazon Music</span>
                        </a>
                        <a href="https://deezer.page.link/SJMHMZYcwWNGwzaC8" target="_blank" class="platform-link">
                            <i class="fab fa-deezer w-5 text-center text-[#7BBEFD] text-base"></i>
                            <span class="text-xs tracking-[0.2em] uppercase">Deezer</span>
                        </a>
                        <a href="https://www.pandora.com/artist/adelitas-way/AR9nwJqqKlx6jfX?part=ug-desktop&corr=78126900370740318" target="_blank" class="platform-link">
                            <i class="fas fa-music w-5 text-center text-[#7BBEFD] text-base"></i>
                            <span class="text-xs tracking-[0.2em] uppercase">Pandora</span>
                        </a>
                        <a href="https://open.spotify.com/artist/1ZjAT2nTrzDIXFfsQ2hWJk?si=8ZAL5B1nSoecjM3yW04M6g" target="_blank" class="platform-link">
                            <i class="fab fa-spotify w-5 text-center text-[#7BBEFD] text-base"></i>
                            <span class="text-xs tracking-[0.2em] uppercase">Spotify</span>
                        </a>
                    </div>
                </div>

                {{-- Connect --}}
                <div>
                    <h3 class="text-white text-base tracking-[0.3em] uppercase mb-5 pb-3 border-b border-white/20">Follow</h3>
                    <div class="space-y-2">
                        <a href="https://instagram.com/adelitasway" target="_blank" class="platform-link">
                            <i class="fab fa-instagram w-5 text-center text-[#7BBEFD] text-base"></i>
                            <span class="text-xs tracking-[0.2em] uppercase">Instagram</span>
                        </a>
                        <a href="https://facebook.com/adelitasway" target="_blank" class="platform-link">
                            <i class="fab fa-facebook w-5 text-center text-[#7BBEFD] text-base"></i>
                            <span class="text-xs tracking-[0.2em] uppercase">Facebook</span>
                        </a>
                        <a href="https://tiktok.com/@adelitaswayofficial" target="_blank" class="platform-link">
                            <i class="fab fa-tiktok w-5 text-center text-[#7BBEFD] text-base"></i>
                            <span class="text-xs tracking-[0.2em] uppercase">TikTok</span>
                        </a>
                        <a href="https://x.com/adelitasway" target="_blank" class="platform-link">
                            <i class="fab fa-x-twitter w-5 text-center text-[#7BBEFD] text-base"></i>
                            <span class="text-xs tracking-[0.2em] uppercase">X / Twitter</span>
                        </a>
                        <a href="https://music.youtube.com/channel/UCIvxydw1iiMih2-4r3ts8aA?si=EQgpU97IU4bvnn2O" target="_blank" class="platform-link">
                            <i class="fab fa-youtube w-5 text-center text-[#7BBEFD] text-base"></i>
                            <span class="text-xs tracking-[0.2em] uppercase">YouTube</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        var readMoreLink = document.getElementById('readMore');
        var readMoreArrow = document.getElementById('readMoreArrow');
        var moreText = document.getElementById('moreText');

        readMoreLink.addEventListener('click', function(event) {
            event.preventDefault();

            if (moreText.style.maxHeight) {
                moreText.style.maxHeight = null;
                readMoreLink.childNodes[0].textContent = 'Read More ';
                readMoreArrow.style.transform = 'rotate(0deg)';
                document.getElementById('about').scrollIntoView({ behavior: 'smooth' });
            } else {
                moreText.style.maxHeight = moreText.scrollHeight + 'px';
                readMoreLink.childNodes[0].textContent = 'Read Less ';
                readMoreArrow.style.transform = 'rotate(180deg)';
            }
        });
    </script>
@endpush
