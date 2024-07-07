$(document).ready(function() {
    
    "use strict";
    
    $('#tree1').jstree({
		'core' : {
			'themes' : {
				'responsive': false
			}
		},
        'types' : {
            'default' : {
                'icon' : 'fa fa-folder icon-state-info icon-md'
            },
            'file' : {
                'icon' : 'fa fa-file icon-state-default icon-md'
            }
        },
        'plugins' : ['types']
    });
    $('#tree2').jstree({
		'core' : {
			'themes' : {
				'responsive': false
			}
		},
        'types' : {
            'default' : {
                'icon' : 'fa fa-folder icon-state-info icon-md'
            },
            'file' : {
                'icon' : 'fa fa-file icon-state-default icon-md'
            }
        },
        'plugins' : ['types']
    });
});