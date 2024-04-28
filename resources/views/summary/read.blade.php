<x-app-layout>
    <x-slot name="title">| Baca</x-slot>
    <section class="max-w-screen-xl mx-auto p-4">
        <a href="{{ route('perpustakaan') }} " class="my-2"><span class="text-black">&#60;</span> Kembali ke
            Perpustakaan</a>

        <div class="lg:flex justify-between">
            <!-- Bacaan -->
            <div id="default-tab-content" class="flex flex-col w-full">
                <!-- Judul -->
                <p class="font-semibold text-lg lg:text-2xl my-6 w-full">{{ $book->title }}</p>
                <!-- Konten -->
                @if (!$topics->isEmpty())
                    @foreach ($topics as $topic)
                        <div class="hidden p-4 rounded-lg border-2 mr-4 break-words" id="topik1"
                            role="tabpanel" aria-labelledby="topik1-tab">
                            <!-- Topik -->

                            <p id="topicTitle" class="text-center font-medium text-lg border-b-2 border-gray-900 py-2">
                                {{ $topic->title }}
                            </p>
                            <p id="topicContent" class="indent-[100px] text-justify text-lg py-4 tracking-wide">
                                {{ $topic->content }}</p>
                        </div>
                    @endforeach
                @else
                    <p>Kosong</p>
                @endif

                <!-- Pagination -->
                <div class="flex justify-between mb-auto">
                    {{ $topics->links('vendor.pagination.simple-tailwind') }}
                </div>
            </div>

            <div class="lg:mt-20">
                <div
                    class="overflow-hidden p-4 mb-4 border-2 rounded-lg border-gray-200">
                    <p class="font-semibold text-md lg:text-xl">Gaya Tulisan</p>
                    <div class="gap-y-2 my-2">
                        <button id="poppins"
                            class="bg-darkblue text-white rounded-md py-1 px-2">Poppins</button>
                        <button id="albertSans" class="bg-gray-300 rounded-md py-1 px-2 font-albert">Albert
                            Sans</button>
                        <button id="merriweather"
                            class="bg-gray-300 mt-1 rounded-md py-1 px-2 font-merriweather">Merriweather</button>
                    </div>
                    {{-- <p class="font-semibold text-md lg:text-xl lg:mb-2 ">Ukuran Tulisan</p>
                    <div class="flex items-center">
                        <select name="font" id="font" class="rounded-md w-1/2">
                            <option value="1">16</option>
                            <option value="1">20</option>
                            <option value="1">24</option>
                            <option value="1">26</option>
                        </select>
                        <button class="bg-gray-300 lg:rounded-md lg:py-1 lg:px-2 mx-2">OK</button>
                    </div> --}}
                </div>
                <!-- List Topik -->
                <div class="overflow-hidden p-4 border-2 rounded-lg border-gray-200">
                    <p class="font-semibold text-md lg:text-xl">Topik</p>
                    <ul class="text-md font-medium" id="default-tab" data-tabs-toggle="#default-tab-content"
                        role="tablist">
                        <li class="ms-2" role="presentation">
                            @php
                                $topic_title = [];
                            @endphp
                            <button class="pt-4 rounded-t-lg text-left " id="topik1-tab" data-tabs-target="#topik1"
                                type="button" role="tab" aria-controls="topik1" aria-selected="false">
                                @foreach ($topicTitles as $topicTitle)
                                    @php
                                        $topic_title[] = $topicTitle->title;
                                    @endphp
                                @endforeach
                                {{ $topics->links('vendor.pagination.topic-list', ['topic_title' => $topic_title]) }}
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            var fonts = {
                poppins: {
                    background: "#190482",
                    color: "#fff",
                    fontFamily: "Poppins, sans-serif"
                },
                albertSans: {
                    background: "#190482",
                    color: "#fff",
                    fontFamily: "Albert Sans, sans-serif"
                },
                merriweather: {
                    background: "#190482",
                    color: "#fff",
                    fontFamily: "Merriweather Sans, sans-serif"
                }
            };

            $("#poppins, #albertSans, #merriweather").on('click', function() {
                var fontId = $(this).attr('id');
                console.log(fontId + " clicked!");
                $(this).css(fonts[fontId]);

                $.each(fonts, function(key, value) {
                    if (key !== fontId) {
                        $("#" + key).css({
                            "background-color": "#D1D5DB",
                            "color": "#000"
                        });
                    }
                });

                $("#topicContent").css({
                    "font-family": fonts[fontId].fontFamily
                });
            });
        });
    </script>
</x-app-layout>
