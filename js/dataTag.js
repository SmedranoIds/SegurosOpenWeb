var mobil;
var sysEnv;
if(navigator.userAgent.match(/Mobile/i)){
    mobil = "si";
    sysEnv = "web-movil";
}else{
    mobil = "no";
    sysEnv = "escritorio";
}
digitalData = {
      versionDL: "1.10",
      pageInstanceID: "de",
      page: {
			pageInfo: {
					pageName: "",
					pageIntent: "",
					pageSegment: "",
					sysEnv: sysEnv, 
					version: "1.1",
					channel: "online",
					language: navigator.languages[1],
					geoRegion: "",
					level1: "",
					level2: "",
					level3: "",
					level4: "",
					level5: "",
					level6: "",
					level7: "",
					level8: "",
					level9: "",
					level10: "",
					area: "publica",
					server: window.location.hostname,
					bussinessUnit: "BBVA Bancomer",
					errorPage: ""
			},
			pageActivity: {
            search: {
                onSiteSearchResults: "",
                onSiteSearchTerm: "",
                originalPage: ""
            },
            nameOfVideoDisplayed: ""
        }
		},
	internalCampaign: {
        attributes: [],
        event: {
            eventInfo: {
                eventName: "",
                siteActionName: ""
            }
        }
    },
	user: {
    		device: {
						userAgent: navigator.userAgent,
            			mobile: mobil
          },
			userState: "no logado",
			segment: {
	                	global: "",
	                	profile: ""
	        },
            profileID: "",    	           
        gender: "",
        country: "",
        age: "" 
	},
	product: {
			primaryCategory: "seguros",
			productSubtype: "",
			productName: "seguro hogar"
	},
	application: {
			application: {
			            type: "contratacion",
			            name: "seguro hogar",
			},
			fulfillmentModel: "online",
		  	step: "1 registro",
		  	state: "inicio",
		  	transactionID: "",
			amount: "",
            paymentAmount: "",
            numberOfPayments: "",
            paymentDate: "",
            paymentType: "",
            serviceCharge: "",
            typology: "",
            currency: "",
            programTypeHired: "",
            offer: "",
            operationNumber: "",
            term: "",
            interestRate: "",
            process: "",
            interactionLevel: "",
            errorType: ""
	}	
};