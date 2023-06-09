@php
    $socialList = [
        [
            'url' => '#',
            'path' => 'fa-instagram',
        ],
        [
            'url' => '#',
            'path' => 'fa-facebook',
        ],
        [
            'url' => '#',
            'path' => 'fa-twitter',
        ],
    ];
    $footerMenu = [
        [
            'title' => 'Team 6',
            'list' => [
                [
                    'name' => 'Alessio De Angelis',
                    'href' => 'https://github.com/DeAngelisDev16',
                ],
                [
                    'name' => 'Roberto Carta Mantiglia',
                    'href' => 'https://github.com/RobertoCartaMantiglia',
                ],
                [
                    'name' => 'Renato Fringuello',
                    'href' => 'https://github.com/RenatoFringuello',
                ],
                [
                    'name' => 'Claudio Emmolo',
                    'href' => 'https://github.com/Claudio-Emmolo',
                ],
            ],
        ],
        [
            'title' => 'Bool Teach',
            'list' => [
                [
                    'name' => 'Riccardo Petricca',
                    'href' => 'https://github.com/rc2pc2',
                ],
                [
                    'name' => 'Luigi Micco',
                    'href' => 'https://github.com/luigimicco',
                ],
                [
                    'name' => 'Stefano Cappellini',
                    'href' => 'https://github.com/StefanoCappellini',
                ],
            ],
        ],
        [
            'title' => 'Policy',
            'list' => [
                [
                    'name' => 'Notes',
                    'href' => '#',
                ],
                [
                    'name' => 'Policy',
                    'href' => '#',
                ],
                [
                    'name' => 'Cookies',
                    'href' => '#',
                ],
                [
                    'name' => 'Help',
                    'href' => '#',
                ],
                [
                    'name' => 'Teams',
                    'href' => '#',
                ],
            ],
        ],
    ];
@endphp

<footer class="position-relative">
    <div class="wave-shape">
        <img src="{{ asset('assets/bottom-shape.png') }}" alt="">
    </div>
    <div class="container h-100">

        <!-- Top footer -->
        <section id="top-footer">
            <div class="row h-100">
                <div class="col-12 col-md-6">
                    <img src="{{ asset('assets/B-Doc-Logo.png') }}" alt="Main Logo" class="footer-logo mb-2">
                    <p class="w-100">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum, aspernatur totam?
                        Amet inventore eos possimus quis hic nulla debitis provident eveniet tempore sunt quod
                        ducimus itaque nesciunt dolores, excepturi saepe?
                    </p>

                </div>
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <div class="row w-100 d-flex justify-content-around ps-md-5">
                        {{-- foreach --}}
                        @foreach ($footerMenu as $menu)
                            <div class="col-12 col-md-4 mb-3 mb-md-0">
                                <div class="list-item">
                                    <h4>{{ $menu['title'] }}</h4>
                                    <ul>
                                        @foreach ($menu['list'] as $list)
                                            <li>
                                                <a href="{{ $list['href'] }}">
                                                    {{ $list['name'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <div class="separator"></div>

        <!-- Bottom footer -->
        <section id="bottom-footer">
            <div class="row h-100">
                <div
                    class="col-12 col-md-6 d-flex align-items-center mb-3 justify-content-center justify-content-md-start">
                    <p class="text-center m-0 text-light">&copy;2023 - BDoctor | Design by
                        <span class="box-lime">Lime</span><span class="box-magenta">Magenta</span> Company
                    </p>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-end">
                    @foreach ($socialList as $social)
                        <a href="#">
                            <i class="{{ $social['path'] }} fa-brands fs-3 text-light me-3"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</footer>
