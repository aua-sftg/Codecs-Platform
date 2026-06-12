<h4 class="text-color-custom-blue font-weight-bold mb-4">
    Technology Assessment Tool for Digital Agriculture
</h4>

<p class="text-3-5 mb-3">
    The Technology Assessment Tool is designed to support a systematic, transparent, and user-centred evaluation of digital agricultural technologies, with a particular focus on solutions tested and implemented within Living Labs. It enables a structured comparison of technologies based on nearly 60 assessment criteria, covering key dimensions such as technical performance, usability, data management, interoperability, economic impact, sustainability, and advisory value. All criteria are assessed using a Likert scale, ensuring consistency, comparability, and clarity across evaluations.
</p>

<p class="text-3-5 mb-3">
    The primary users of the tool include farmers, agricultural advisors, researchers, and technology providers. For these stakeholders, the tool serves as a robust decision-support framework to better understand the strengths, limitations, and suitability of different digital solutions. The resulting insights support informed technology adoption decisions, strengthen advisory services, and contribute to improved productivity, sustainability, and overall farm management efficiency.
</p>

<p class="text-3-5 mb-3">
    The results are displayed as a straightforward ranking list, starting with the highest-scoring technology in first place and continuing in order for all technologies included in the tool.
</p>

<div class="text-center my-4">
    <figure class="figure">
        <img src="{{ asset('img/tat_v2.jpg') }}"
             class="figure-img img-fluid rounded"
             alt="Technology Assessment Tool">
    </figure>
</div>

<a href="https://www.youtube.com/watch?v=USxsfLb4Qhg" target="_blank" class="font-weight-bold text-custom-green text-3-5 green-border text-center ms-auto me-auto d-block text-decoration-none" style="max-width: 317px">See example</a>

<h4 class="text-color-custom-blue font-weight-bold mb-4">
    Methodology
</h4>

<p class="text-3-5">
    The Technology Assessment Tool applies a Multi-Criteria Decision Analysis (MCDA) approach by integrating the Entropy Weight Method (EWM) and the Technique for Order Preference by Similarity to Ideal Solution (TOPSIS) to evaluate and rank digital agricultural technologies. This combined methodology ensures an objective, data-driven, and transparent assessment of technologies across a large and diverse set of criteria.
</p>

<div style="border: 1px solid #A0B63C;" class="mt-4">
    <div class="subsection_green text-4 font-weight-bold mb-3" style="padding: 24px 12px;">
        Entropy Weight Method (EWM)
    </div>
    <div style="padding: 0 12px;">
        <p class="text-3-5 mb-3">
            The Entropy Weight Method is used to determine the relative importance (weights) of the assessment criteria based on the variability of the data. Unlike subjective weighting methods, entropy weighting relies solely on the information contained in the evaluation matrix. Criteria that show higher variability across technologies are assigned higher weights, as they provide greater discriminatory power in the assessment process. This makes entropy particularly suitable for evaluations involving a large number of criteria, where traditional methods such as Analytic Hierarchy Process (AHP) become impractical.
        </p>
        <p class="text-3-5 mb-3">
            The entropy weighting process involves normalizing the decision matrix, calculating entropy values for each criterion, determining the degree of divergence, and finally computing objective criterion weights. These weights reflect the informational contribution of each criterion to the overall assessment.
        </p>
    </div>
</div>

<div style="border: 1px solid #A0B63C;" class="mt-4">
    <div class="subsection_green text-4 font-weight-bold mb-3" style="padding: 24px 12px;">
        TOPSIS Ranking Method
    </div>
    <div style="padding: 0 12px;">
        <p class="text-3-5 mb-3">
            Once the criteria weights are established, TOPSIS is applied to rank the assessed technologies. TOPSIS is based on the principle that the best-performing technology should have the shortest distance from the positive ideal solution (best possible performance across all criteria) and the farthest distance from the negative ideal solution (worst possible performance).
        </p>
        <p class="text-3-5 mb-3">
            The TOPSIS procedure includes normalizing the weighted decision matrix, identifying ideal and anti-ideal solutions, calculating separation distances for each technology, and computing a relative closeness score. Technologies are then ranked according to these scores, providing a clear and interpretable comparison of their overall performance.
        </p>
    </div>
</div>

<div class="tool_shadow_section my-5">
    <p class="text-color-custom-blue text-3-5 font-weight-semibold mb-3">
        Integrated Assessment Approach
    </p>
    <p class="text-3-5 mb-3">
        The integration of Entropy weighting and TOPSIS combines objective criterion weighting with robust ranking capabilities, making it a well-suited methodology for evaluating digital agricultural technologies. This approach ensures fairness, scalability, and transparency, while supporting evidence-based decision-making for farmers, advisors, and technology providers.
    </p>
</div>

<div class="tool_shadow_section my-5 text-center">
    <p class="text-custom-green text-3-5 font-weight-bold mb-3">
        Assess &amp; Rank Digital Technologies
    </p>
    <p class="text-3-5">
        Use the Technology Assessment Tool to compare digital solutions based on expert evaluations and user priorities.
    </p>
    <div class="subsection_green text-4 font-weight-bold text-center mt-4 ms-auto me-auto" style="padding: 24px 12px; max-width: 317px;">
        <a href="{{ route('tat_calculator') }}" class="text-white">
            GO TO CALCULATOR
        </a>
    </div>
</div>
