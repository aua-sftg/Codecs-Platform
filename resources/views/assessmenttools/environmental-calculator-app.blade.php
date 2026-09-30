<x-layout.layout>
    <x-slot:title>
        Codecs | Environmental Calculator
    </x-slot:title>
    <x-slot:keywords>
        Codecs, Environmental Calculator, LCA, Life Cycle Assessment, agriculture, digitalization
    </x-slot:keywords>
    <x-slot:description>
        Environmental Impact Calculator - Life Cycle Assessment tool for digital agriculture
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:sub_section>
                <a role="button" href="{{route('assessment_tools')}}">Assessment Tools</a>
            </x-slot:sub_section>
            <x-slot:current_view>
                Environmental Calculator
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container-fluid p-0">
            <iframe src="{{ asset('assessment_tools/envir_calculator/index.html') }}" 
                    width="100%" 
                    height="800px" 
                    frameborder="0"
                    style="min-height: 100vh;"
                    title="Environmental Calculator">
            </iframe>
        </div>
    </x-slot:main_body>

    <x-slot:body_scripts>
        <script>
            // Optional: Make iframe responsive
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