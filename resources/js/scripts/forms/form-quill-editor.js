/*=========================================================================================
	File Name: form-quill-editor.js
	Description: Quill is a modern rich text editor built for compatibility and extensibility.
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
  'use strict';

  var Font = Quill.import('formats/font');
  Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
  Quill.register(Font, true);

  var inputUz = document.querySelector('#content_uz')
  var inputEn = document.querySelector('#content_en')
  var inputRu = document.querySelector('#content_ru')
  var editorUz = new Quill('#editor_uz_container .editor', {
    bounds: '#editor_uz_container .editor',
    compatibilityMode: false,
    modules: {
      formula: true,
      syntax: true,
      toolbar: [
        [
          {
            font: []
          },
          {
            size: []
          }
        ],
        ['bold', 'italic', 'underline', 'strike'],
        [
          {
            color: []
          },
          {
            background: []
          }
        ],
        [
          {
            script: 'super'
          },
          {
            script: 'sub'
          }
        ],
        [
          {
            header: '1'
          },
          {
            header: '2'
          },
          'blockquote',
          'code-block'
        ],
        [
          {
            list: 'ordered'
          },
          {
            list: 'bullet'
          },
          {
            indent: '-1'
          },
          {
            indent: '+1'
          }
        ],
        [
          'direction',
          {
            align: []
          }
        ],
        ['link', 'image', 'video', 'formula'],
        ['clean']
      ]
    },
    theme: 'snow'
  });
  var editorEn = new Quill('#editor_en_container .editor', {
    bounds: '#editor_en_container .editor',
    compatibilityMode: false,
    modules: {
      formula: true,
      syntax: true,
      toolbar: [
        [
          {
            font: []
          },
          {
            size: []
          }
        ],
        ['bold', 'italic', 'underline', 'strike'],
        [
          {
            color: []
          },
          {
            background: []
          }
        ],
        [
          {
            script: 'super'
          },
          {
            script: 'sub'
          }
        ],
        [
          {
            header: '1'
          },
          {
            header: '2'
          },
          'blockquote',
          'code-block'
        ],
        [
          {
            list: 'ordered'
          },
          {
            list: 'bullet'
          },
          {
            indent: '-1'
          },
          {
            indent: '+1'
          }
        ],
        [
          'direction',
          {
            align: []
          }
        ],
        ['link', 'image', 'video', 'formula'],
        ['clean']
      ]
    },
    theme: 'snow'
  });
  var editorRu = new Quill('#editor_ru_container .editor', {
    bounds: '#editor_ru_container .editor',
    compatibilityMode: false,
    modules: {
      formula: true,
      syntax: true,
      toolbar: [
        [
          {
            font: []
          },
          {
            size: []
          }
        ],
        ['bold', 'italic', 'underline', 'strike'],
        [
          {
            color: []
          },
          {
            background: []
          }
        ],
        [
          {
            script: 'super'
          },
          {
            script: 'sub'
          }
        ],
        [
          {
            header: '1'
          },
          {
            header: '2'
          },
          'blockquote',
          'code-block'
        ],
        [
          {
            list: 'ordered'
          },
          {
            list: 'bullet'
          },
          {
            indent: '-1'
          },
          {
            indent: '+1'
          }
        ],
        [
          'direction',
          {
            align: []
          }
        ],
        ['link', 'image', 'video', 'formula'],
        ['clean']
      ]
    },
    theme: 'snow'
  });
  inputUz = editorUz.clipboard.convert($("input[id=content_uz]").val())
  inputEn = editorEn.clipboard.convert($("input[id=content_en]").val())
  inputRu = editorRu.clipboard.convert($("input[id=content_ru]").val())
  editorUz.setContents(inputUz, 'silent')
  editorEn.setContents(inputEn, 'silent')
  editorRu.setContents(inputRu, 'silent')
  var editors = [editorUz,editorEn, editorRu];
  
  editorUz.on('text-change', function(delta, oldDelta, source) {
    var value = editorUz.root.innerHTML;
    $("input[id=content_uz]").val(value);
  });

  editorRu.on('text-change', function(delta, oldDelta, source) {
    var value = editorRu.root.innerHTML;
    $("input[id=content_ru]").val(value);
  });

  editorEn.on('text-change', function(delta, oldDelta, source) {
    var value = editorEn.root.innerHTML;
    $("input[id=content_en]").val(value);
});
})(window, document, jQuery);
