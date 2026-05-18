<x-layout.layout>
    <x-slot:title>
        Codecs | Technology Assessment Tool
    </x-slot:title>
    <x-slot:keywords>
        Codecs, Technology Assessment Tool, TAT, agriculture, digitalization, ranking
    </x-slot:keywords>
    <x-slot:description>
        Technology Assessment Tool - Evaluate and rank digital technologies based on expert and end-user criteria
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:sub_section>
                <a role="button" href="{{route('assessment_tools')}}">Assessment Tools</a>
            </x-slot:sub_section>
            <x-slot:current_view>
                Technology Assessment Tool
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container-fluid p-0">
            <iframe src="{{ asset('assessment_tools/tat_calculator/TAT.html') }}"
                    width="100%"
                    height="800px"
                    frameborder="0"
                    style="min-height: 100vh;"
                    title="Technology Assessment Tool">
            </iframe>
        </div>
    </x-slot:main_body>

    <x-slot:body_scripts>
        <script>
            function resizeIframe() {
                const iframe = document.querySelector('iframe');
                if (iframe) {
                    iframe.style.height = (window.innerHeight - 200) + 'px';
                }
            }

            window.addEventListener('resize', resizeIframe);
            document.addEventListener('DOMContentLoaded', resizeIframe);
        </script>
    </x-slot:body_scripts>
</x-layout.layout>
