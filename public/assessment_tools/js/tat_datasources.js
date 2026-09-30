const dataSources = {
    isUserFriendly: [
        { value: 1, label: "Very unfriendly" },
        { value: 2, label: "Unfriendly" },
        { value: 3, label: "Neutral" },
        { value: 4, label: "User-friendly" },
        { value: 5, label: "Very user-friendly" }
    ],

    accessibleOnlineOffline: [
        { value: 1, label: "Not accessible" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "Mostly accessible" },
        { value: 5, label: "Fully accessible" }
    ],

    isFreeToUse: [
        { value: 1, label: "Not free" },
        { value: 2, label: "Mostly not free" },
        { value: 3, label: "Partially free" },
        { value: 4, label: "Mostly free" },
        { value: 5, label: "Completely free" }
    ],

    supportsNotifications: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Basic" },
        { value: 4, label: "Good" },
        { value: 5, label: "Advanced" }
    ],

    enablesCustomerSupport: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Basic" },
        { value: 4, label: "Effective" },
        { value: 5, label: "Comprehensive" }
    ],

    isUsableOnMultipleDevices: [
        { value: 1, label: "One device" },
        { value: 2, label: "Limited" },
        { value: 3, label: "Some devices" },
        { value: 4, label: "Most devices" },
        { value: 5, label: "All devices" }
    ],

    toolsIntegration: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Partial" },
        { value: 4, label: "Good" },
        { value: 5, label: "Seamless" }
    ],

    multilinguatTools: [
        { value: 1, label: "One language" },
        { value: 2, label: "Few" },
        { value: 3, label: "Several" },
        { value: 4, label: "Many" },
        { value: 5, label: "Fully localized" }
    ],

    openStandardDatasource: [
        { value: 1, label: "No" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Partial" },
        { value: 4, label: "Strong" },
        { value: 5, label: "Fully aligned" }
    ],

    requiredTraining: [
        { value: 1, label: "Extensive" },
        { value: 2, label: "Significant" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "Minimal" },
        { value: 5, label: "None" }
    ],

    holisticFarmManagement: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Partial" },
        { value: 4, label: "Strong" },
        { value: 5, label: "Fully holistic" }
    ],

    regionSpecificRecommendations: [
        { value: 1, label: "None" },
        { value: 2, label: "Low" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "Good" },
        { value: 5, label: "Highly tailored" }
    ],

    weatherAndPestAlerts: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Basic" },
        { value: 4, label: "Reliable" },
        { value: 5, label: "Advanced" }
    ],

    aiDrivenRecommendations: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Basic" },
        { value: 4, label: "Advanced" },
        { value: 5, label: "Highly adaptive" }
    ],

    scenarioPlanningTool: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Basic" },
        { value: 4, label: "Advanced" },
        { value: 5, label: "Comprehensive" }
    ],

    productivityMetrics: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Basic" },
        { value: 4, label: "Detailed" },
        { value: 5, label: "Advanced" }
    ],

    diagnosticSupport: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Basic" },
        { value: 4, label: "Strong" },
        { value: 5, label: "Advanced" }
    ],

    farmAdvisorInteraction: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "Strong" },
        { value: 5, label: "Highly collaborative" }
    ],

    increasesFarmProfitability: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Basic" },
        { value: 4, label: "Strong" },
        { value: 5, label: "Advanced" }
    ],

    savesTime: [
        { value: 1, label: "None" },
        { value: 2, label: "Low" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "High" },
        { value: 5, label: "Very high" }
    ],

    savesMoney: [
        { value: 1, label: "None" },
        { value: 2, label: "Low" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "High" },
        { value: 5, label: "Very high" }
    ],

    usesFarmSpecificData: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Partial" },
        { value: 4, label: "Extensive" },
        { value: 5, label: "Fully tailored" }
    ],

    pullsDataFromOtherSystems: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Some" },
        { value: 4, label: "Multiple" },
        { value: 5, label: "Fully automated" }
    ],

    isDataDriven: [
        { value: 1, label: "No" },
        { value: 2, label: "Low" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "Strong" },
        { value: 5, label: "Fully data-driven" }
    ],

    allowsInteroperability: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Partial" },
        { value: 4, label: "High" },
        { value: 5, label: "Full" }
    ],

    ensuresDataSecurity: [
        { value: 1, label: "None" },
        { value: 2, label: "Weak" },
        { value: 3, label: "Basic" },
        { value: 4, label: "Strong" },
        { value: 5, label: "Advanced & compliant" }
    ],

    yesNo: [
        { value: 1, label: "No" },
        { value: 5, label: "Yes" }
    ],

    /* =========================
       E. Economic & Organization
       ========================= */
    improvesProfitability: [
        { value: 1, label: "None" },
        { value: 2, label: "Low" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "High" },
        { value: 5, label: "Very high" }
    ],

    alignsWithStrategy: [
        { value: 1, label: "No" },
        { value: 2, label: "Low" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "Strong" },
        { value: 5, label: "Fully aligned" }
    ],

    changeManagement: [
        { value: 1, label: "None" },
        { value: 2, label: "Low" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "Strong" },
        { value: 5, label: "Excellent" }
    ],

    marketTrendInsights: [
        { value: 1, label: "None" },
        { value: 2, label: "Very limited" },
        { value: 3, label: "Basic" },
        { value: 4, label: "Good" },
        { value: 5, label: "Advanced" }
    ],

    addsValueToServices: [
        { value: 1, label: "None" },
        { value: 2, label: "Low" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "High" },
        { value: 5, label: "Very high" }
    ],

    generalEconomicAdvantages: [
        { value: 1, label: "None" },
        { value: 2, label: "Low" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "High" },
        { value: 5, label: "Very high" }
    ],

    costSavingOpportunities: [
        { value: 1, label: "None" },
        { value: 2, label: "Low" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "High" },
        { value: 5, label: "Very high" }
    ],

    /* =========================
       F. Sustainability
       ========================= */
    sustainabilityScale: [
        { value: 1, label: "None" },
        { value: 2, label: "Low" },
        { value: 3, label: "Moderate" },
        { value: 4, label: "High" },
        { value: 5, label: "Very high" }
    ]
};




