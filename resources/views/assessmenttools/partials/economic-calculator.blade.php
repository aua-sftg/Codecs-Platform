<h4 class="text-color-custom-blue font-weight-bold mb-4">
    Economic Calculator
</h4>

<p class="text-3-5">
    The Economic Calculator helps farmers and agricultural enterprises evaluate and compare the financial costs and benefits of adopting digital technologies. It uses the Net Present Value (NPV) approach to determine whether an investment in digital technology is financially worthwhile over time. The NPV analysis compares the present value of all expected benefits (inflows) with the present value of all costs (outflows) associated with the adoption of the technology.
</p>

<div class="row text-center mb-5">
    <div class="col-md-4">
        <p class="font-weight-bold text-custom-green text-3-5 green-border">Costs</p>
        <div class="d-flex align-items-center mb-2" style="padding-left: 12px">
            <span ><img class="me-2" src="{{ asset('img/assessment-tools/economic/equipment.png') }}"/></span>
            <span class="text-3-5 text-custom-green font-weight-semi-bold">New equipment</span>
        </div>
        <div class="d-flex align-items-center" style="padding-left: 12px">
            <span ><img class="me-2" src="{{ asset('img/assessment-tools/economic/training.png') }}"/></span>
            <span class="text-3-5 text-custom-green font-weight-semi-bold">Training</span>
        </div>
    </div>
    <div class="text-center col-md-4">
        <figure class="figure">
            <img src="{{ asset('img/assessment-tools/economic/Libra.png') }}" 
                class="figure-img img-fluid rounded" 
                alt="Economic Calculator - Costs vs Benefits"
                style="max-width: 600px;">
        </figure>
    </div>
    <div class="col-md-4">
        <p class="font-weight-bold text-custom-green text-3-5 green-border">Benefits</p>
        <div class="d-flex align-items-center mb-2" style="padding-left: 12px">
            <span ><img class="me-2" src="{{ asset('img/assessment-tools/economic/income.png') }}"/></span>
            <span class="text-3-5 text-custom-green font-weight-semi-bold">Greater income</span>
        </div>
        <div class="d-flex align-items-center" style="padding-left: 12px">
            <span ><img class="me-2" src="{{ asset('img/assessment-tools/economic/operations.png') }}"/></span>
            <span class="text-3-5 text-custom-green font-weight-semi-bold">Faster Operations</span>
        </div>
    </div>
</div>

<h4 class="text-color-custom-blue font-weight-bold mb-4">
    Goal of the Economic Calculator
</h4>

<p class="text-3-5">
    Within the CODECS project, this tool is designed to compare economic performance before and after digitalisation and to assess whether investments in digital technologies improve the profitability of a farm or agricultural enterprise. It is a simple, easy-to-use tool that provides preliminary insights to support farm-level decision-making. Users are encouraged to consult a financial advisor before making any long-term investment or farm-planning decisions.
</p>
<a href="https://www.youtube.com/watch?v=7_iT82qY_Rg" target="_blank" class="font-weight-bold text-custom-green text-3-5 green-border text-center ms-auto me-auto d-block text-decoration-none" style="max-width: 317px">See example</a>


<h4 class="text-color-custom-blue font-weight-bold mb-4 mt-4">
    Methodology
</h4>

<p class="text-3-5 mb-3">
    The Economic Calculator uses the Net Present Value (NPV) methodology. NPV represents the sum of the present values of future net cash flows (benefits minus costs) over the investment period, accounting at a user-defined rate.
</p>

<div class="text-center my-4">
    <p class="text-3-5 mb-2">The NPV formula is:</p>
    <img src="{{ asset('img/assessment-tools/economic/NPV_formula.png') }}" 
            class="img-fluid" 
            alt="Net Present Value Formula">
    <p class="text-3-5 mt-3 text-left" style="max-width: 800px; margin: 0 auto;">
        where <strong>r</strong> is the discount rate, <strong>t</strong> is the year and <strong>n</strong> is the number of years of the investment.<br>
        The figure below shows in a simple roadmap on how the tool works:
    </p>
</div>

<div class="row mt-4">
    <div class="col-md-4 mb-3">
        <div class="h-100 roadmap-box">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <span class="text-12 font-weight-bold text-white blue-outline" style="margin-top: 10px; margin-left: 8px;">1.</span>
                <img src="{{ asset('img/assessment-tools/economic/dollar.png') }}" alt="Investment">
            </div>
            <div>
                <h6 class="font-weight-bold text-3-5" style="padding-left: 12px; color:#1C64B6;">Specify the Investment</h6>
                <ul class="text-3-5 pl-3 mb-0 font-weight-medium">
                    <li>Define the scope of the analysis (type of technology and time frame)</li>
                    <li>List all changes in costs and benefits expected from adopting the digital technology</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="h-100 roadmap-box">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <span class="text-12 font-weight-bold text-white blue-outline" style="margin-top: 10px; margin-left: 8px;">2.</span>
                <img src="{{ asset('img/assessment-tools/economic/calc.png') }}" alt="Calculator">
            </div>
            <div>
                <h6 class="font-weight-bold text-3-5" style="padding-left: 12px; color:#1C64B6;">Use the Calculator to estimate the NPV</h6>
                <ul class="text-3-5 pl-3 mb-0 font-weight-medium">
                    <li>Enter annual costs, benefits, investment period, and discount rate into the calculator</li>
                    <li>Run the calculation to obtain your NPV result</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="h-100 roadmap-box">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <span class="text-12 font-weight-bold text-white blue-outline" style="margin-top: 10px; margin-left: 8px;">3.</span>
                <img src="{{ asset('img/assessment-tools/economic/search.png') }}" alt="Analysis">
            </div>
            <div>
                <h6 class="font-weight-bold text-3-5" style="padding-left: 12px; color:#1C64B6;">Interpret Results & Run Sensitivity Analysis</h6>
                <ul class="text-3-5 pl-3 mb-0 font-weight-medium">
                    <li>Assess NPV >0 indicates economic viability; &lt;0 indicates the investment is not justified</li>
                    <li>Test how results change with key variables (e.g., modify the discount rate)</li>
                </ul>
            </div>
        </div>
    </div>
</div>



<div class="tool_shadow_section my-5 text-center">
    <p class="text-custom-green text-3-5 font-weight-bold mb-3">
        Evaluate Your Investment
    </p>
    <p class="text-3-5">
        Use the Economic Calculator to compare costs and benefits of digital technologies. Find out if your investment will pay off over time.
    </p>
    <div class="subsection_green text-4 font-weight-bold text-center mt-4 ms-auto me-auto" style="padding: 24px 12px; max-width: 317px;">
        <a href="{{ route('economic_calculator') }}" class="text-white">
            GO TO CALCULATOR
        </a>
    </div>
</div>



