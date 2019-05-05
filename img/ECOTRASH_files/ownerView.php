var commonElements = {
  classNames: {
    container: 'jfEmbed-section-area',
    title: 'jfEmbed-section-title',
    content: 'jfEmbed-section-content'
  },

  container: function() { return createDomElement('div', { class: this.classNames.container }); },
  appTitle: function(text) { return this.nodeWithText('h1', text); },
  title: function(text) { return this.nodeWithText('h2', text, this.classNames.title); },
  subTitle: function(text) { return this.nodeWithText('h3', text, this.classNames.subTitle); },
  content: function(section) { return createDomElement('div', { class: this.classNames.content + ' ' + section }); },

  fieldset: function() { return createDomElement('fieldset', { class: 'jfEmbed-fieldset' }) },
  span: function(text) { return this.nodeWithText('span', text); },
  list: function() { return createDomElement('ul'); },
  listItem: function () { return createDomElement('li'); },

  nodeWithText: function(tag, text, className) {
    var node = createDomElement(tag, { class: className ? className : '' });
    if (text) node.appendChild(document.createTextNode(text));
    return node;
  },

  numberInput: function(value) { return createDomElement('input', { type: 'number', value: value ? value : '' })},
  colorInput: function(value) { return createDomElement('input', { type: 'color', value: value ? value : '#ffffff' })},
  button: function(text) {
    var node = this.nodeWithText('button', text);
    node.setAttribute('type', 'button');
    return node;
  }
}

var header = {
  createHTML: function() {
    this.container = createDomElement('div', { class: 'jfEmbed-header' });

    this.title = commonElements.appTitle('Inline Embed Settings');

    this.closeButton = createDomElement('button', { id: 'closeButton', class: 'jfEmbed-close', style: 'float: right;' });
    //this.closeButtonImg = createDomElement('img', { src: 'https://cl.ly/3Q2K0c323S2S/download/close.svg' });
    //this.closeButton.appendChild(this.closeButtonImg);

    this.container.appendChild(this.title);
    this.container.appendChild(this.closeButton);
  }
};

var tabs = {
  createHTML: function() {
    this.container = createDomElement('div', { class: 'jfEmbed-tab cf' });
    this.designTab = createDomElement('button', { class: 'active' });
    this.designTab.innerHTML = 'DESIGN';
    this.optionTab = createDomElement('button');
    this.optionTab.innerHTML = 'OPTIONS';

    this.container.appendChild(this.designTab);
    this.container.appendChild(this.optionTab);
  }
};

var frameSize = {
  createHTML: function() {
    this.container = commonElements.container();
    this.title = commonElements.title('FRAME SIZE');

    this.content = commonElements.content('c1');

    this.widthFieldset = commonElements.fieldset();
    this.widthInput = commonElements.numberInput();
    this.widthChar = commonElements.span('W');
    this.widthFieldset.appendChild(this.widthInput);
    this.widthFieldset.appendChild(this.widthChar);

    this.heightFieldset = commonElements.fieldset();
    this.heightInput = commonElements.numberInput();
    this.heightChar = commonElements.span('H');
    this.heightFieldset.appendChild(this.heightInput);
    this.heightFieldset.appendChild(this.heightChar);

    this.resetSizeButton = createDomElement('button', { class: 'jfEmbed-reset' });
    this.resetSizeButton.innerHTML = 'Reset Size';

    this.content.appendChild(this.widthFieldset);
    this.content.appendChild(this.heightFieldset);
    this.content.appendChild(this.resetSizeButton);

    this.container.appendChild(this.title);
    this.container.appendChild(this.content);
  }
};

var formBackground = {
  colors: ['#F95A54', '#F26942', '#FDCC42', '#76EBC8', '#1B7F89', '#80509A'],
  colorElements: [],
  createHTML: function() {
    this.container = commonElements.container();
    this.title = commonElements.title('FORM BACKGROUND COLOR');

    //this.content = commonElements.content('c2');

    //this.clearfix = createDomElement('div', { class: 'cf' });
    // this.leftSide = createDomElement('div', { class: 'left' });

    // this.opacityHeader = commonElements.subTitle('Opacity');

    // this.opacityFieldset = commonElements.fieldset();
    // this.opacityInput = commonElements.numberInput(100); // initial value = 100;
    // this.opacityChar = commonElements.span('%');
    // this.opacityFieldset.appendChild(this.opacityInput);
    // this.opacityFieldset.appendChild(this.opacityChar);

    // this.leftSide.appendChild(this.opacityHeader);
    // this.leftSide.appendChild(this.opacityFieldset);

    //this.rightSide = createDomElement('div', { class: 'right' });
    this.bgTitle = commonElements.subTitle('Background Color');
    this.list = createDomElement('ul', { class: 'jfEmbed-colorList' });
    
    this.colors.forEach(function(color) {
      var colorItem = commonElements.listItem();
      colorItem.setAttribute('style', 'background: ' + color);
      colorItem.setAttribute('data-value', color);
      this.list.appendChild(colorItem);
      this.colorElements.push({ ele: colorItem, value: color });
    }.bind(this));

    var clonedItem = commonElements.listItem();
    this.colorInput = commonElements.colorInput();
    this.colorInput.setAttribute('data-type', 'background')
    clonedItem.appendChild(this.colorInput);
    this.list.appendChild(clonedItem);

    // this.rightSide.appendChild(this.bgTitle);
    //this.content.appendChild(this.list);

    // this.uploadContainer = createDomElement('div');
    // this.uploadHeader = createDomElement('h3', { class: 'jfEmbed-sub-title' });
    // this.uploadHeader.innerHTML = 'Upload a Background Image';
    // this.uploadWrapper = createDomElement('div', { class: 'image-upload' });
    // this.uploadLabel = createDomElement('label', { for: 'file-input' });
    // this.uploadImg = createDomElement('img', { src: 'https://cl.ly/3e1M0p1L4110/download/upload.svg' });
    // this.uploadInput = createDomElement('input', { id: 'file-input', type: 'file' });

    // this.uploadLabel.appendChild(this.uploadImg);
    // this.uploadWrapper.appendChild(this.uploadLabel);
    // this.uploadWrapper.appendChild(this.uploadInput);

    // this.uploadContainer.appendChild(this.uploadHeader);
    // this.uploadContainer.appendChild(this.uploadWrapper);

    //this.clearfix.appendChild(this.leftSide);
    //this.clearfix.appendChild(this.rightSide);

    //this.content.appendChild(this.clearfix);
    // this.content.appendChild(this.clearfix2);
    // this.content.appendChild(this.uploadContainer);

    this.container.appendChild(this.title);
    this.container.appendChild(this.list);
  }
};

var fontFamily = {
  fonts: [{ value: 'Arial', label: 'Arial' }, { value: 'Helvetica', label: 'Helvetica' }, { value: 'Comic Sans', label: 'Comic Sans' }, { value: 'Verdana', label: 'Verdana' }, { value: 'Times New Roman', label: 'Times New Roman' }],
  fontElements: [],
  createHTML: function() {
    this.container = createDomElement('div', { class: 'jfEmbed-section-area' });
    this.fontFamilyWrapperTitle = createDomElement('h2', { class: 'jfEmbed-section-title' });
    this.fontFamilyWrapperTitle.innerHTML = 'FONT FAMILY';

    this.fontOptionContainer = createDomElement('div', { class: 'jfEmbed-section-content c4' });
    this.fontSelect = createDomElement('select');
    var fontOption = createDomElement('option');

    this.fonts.forEach(function(option) {
      var clonedOption = fontOption.cloneNode();
      clonedOption.setAttribute('value', option.value);
      clonedOption.innerHTML = option.label;
      this.fontSelect.appendChild(clonedOption);
      this.fontElements.push({ ele: clonedOption, value: option.value, label: option.label });
    }.bind(this));

    this.fontOptionContainer.appendChild(this.fontSelect);

    this.container.appendChild(this.fontFamilyWrapperTitle);
    this.container.appendChild(this.fontOptionContainer);
  }
};

var actionButtons = {
  createHTML: function() {
    this.container = createDomElement('div', { class: 'jfEmbed-footer cf' });
    
    this.cancelButton = createDomElement('button');
    this.cancelButton.innerHTML = 'CANCEL';
    this.saveButton = createDomElement('button');
    this.saveButton.innerHTML = 'SAVE';

    this.container.appendChild(this.cancelButton);
    this.container.appendChild(this.saveButton);
  }
};

var formElements = {
  options: [{ type: 'onlyCard', label: 'Show only Card and hide all other elements' }, { type: 'toggleTitle', label: 'Show Form Title' }, { type: 'toggleLogo', label: 'Show Logo' }, { type: 'toggleProgress', label: 'Show Progress Bar' }, { type: 'toggleOverview', label: 'Show Overview Button' }, { type: 'toggleShadow', label: 'Show Card Shadow' }],
  listItems: [],
  uncheckedOptions: ['fullpage', 'onlyCard', 'smartEmbed'],
  
  createOptionItem: function(opt) {
    var item = createDomElement('li');
    var label = createDomElement('label');
    var input = createDomElement('input', { type: 'checkbox' });
    var dummySpan = createDomElement('span');
    var inputID = opt.type + '-' + window.name;

    item.setAttribute('data-type', opt.type);
    label.setAttribute('for', inputID);
    input.setAttribute('id', inputID);
    if (this.uncheckedOptions.indexOf(opt.type) === -1) input.setAttribute('checked', true);
    label.appendChild(input);
    label.appendChild(dummySpan);
    label.appendChild(document.createTextNode(opt.label));
    item.appendChild(label);
    return {
      item: item,
      input: input
    };
  },

  createHTML: function() {
    // SMART EMBED HTML ELEMENTS
    this.smartEmbedtitle = createDomElement('h2', { class: 'jfEmbed-section-title' });
    this.smartEmbedtitle.innerHTML = 'SMART EMBED OPTION';
    this.smartEmbedDescription = createDomElement('p', { class: 'jfEmbed-section-text' });
    this.smartEmbedDescription.innerHTML = 'Match style of form to your website. <br> <b>Note: You need to refresh your page for smart embed process to take on.</b>';
    this.smartEmbedList = createDomElement('ul', { class: 'jfEmbed-checkList' });
    //this.smartEmbedContent = createDomElement('div', { class: 'jfEmbed-section-content c5' });
    this.smartEmbedListContent = this.createOptionItem({ type: 'smartEmbed', label: 'Enable Smart Embed' });
    this.smartEmbedList.appendChild(this.smartEmbedListContent.item);

    // INLINE EMBED HTML ELEMENTS
    this.list = createDomElement('ul', { class: 'jfEmbed-checkList' });
    this.container = createDomElement('div', { class: 'jfEmbed-section-area' });
    this.title = createDomElement('h2', { class: 'jfEmbed-section-title' });
    this.title.innerHTML = 'VISIBLE FORM ELEMENT';

    this.description = createDomElement('p', { class: 'jfEmbed-section-text' });
    this.description.innerHTML = 'Choose form elements that you like to <b>hide</b> or <b>show</b> from your embeded form.';

    // this.content = createDomElement('div', { class: 'jfEmbed-section-content c5' });

    this.options.forEach(function(opt) {
      var clones = this.createOptionItem(opt);
      this.list.appendChild(clones.item);
      this.listItems.push({ item: clones.item, options: opt, ele: clones.input });
    }.bind(this));

    //this.container.appendChild(this.list);
    this.container.appendChild(this.title);
    this.container.appendChild(this.description);
    this.container.appendChild(this.list);
    this.container.appendChild(this.smartEmbedtitle);
    this.container.appendChild(this.smartEmbedDescription);
    //this.smartEmbedContent.appendChild(this.smartEmbedList);
    this.container.appendChild(this.smartEmbedList);
  }
}

var commonOptionGroup = {
  createHTML: function(config) {
    this.container = commonElements.container();
    this.title = commonElements.title(config.title);

    this.content = createDomElement('div', { class: 'jfEmbed-colorOptions cf' });
    //this.clearfix = createDomElement('div', { class: 'cf' });

    this.options.forEach(function(opt) {
      var side = createDomElement('div', { class: opt.side });

      var inputWrapper = createDomElement('div', { class: 'selectColor' });
      var input = commonElements.colorInput();
      input.setAttribute('data-type', opt.type);

      inputWrapper.appendChild(input);
      
      var textWrapper = createDomElement('div', { class: 'text' });
      textWrapper.appendChild(document.createTextNode(opt.label));

      side.appendChild(inputWrapper);
      side.appendChild(textWrapper);

      this.content.appendChild(side);
      this.inputs.push( { ele: input, options: opt });
    }.bind(this));

    //this.content.appendChild(this.clearfix);

    this.container.appendChild(this.title);
    this.container.appendChild(this.content);
  }
}

var cardColor = {
  options: [{ side: 'left', type: 'cardColor', label: 'Button Bar Color' }, { side: 'right', type: 'cardBorderColor', label: 'Border Color' }],
  inputs: [],
  config: { options: this.options, title: 'CARD COLOR OPTIONS' },
  createHTML: function() {
    commonOptionGroup.createHTML.bind(this)(this.config);
  }
}

var buttonColor = {
  options: [{ side: 'left', type: 'nextButtonColor', label: 'Next Button BG' }, { side: 'right', type: 'prevButtonColor', label: 'Previous Button BG' }],
  inputs: [],
  config: { options: this.options, title: 'BUTTON COLOR OPTIONS' },
  createHTML: function() {
    commonOptionGroup.createHTML.bind(this)(this.config);
  }
}

var overviewColor = {
  options: [{ side: 'left', type: 'overviewColor', label: 'Background Color' }, { side: 'right', type: 'overviewTextColor', label: 'Text Color' }],
  inputs: [],
  config: { options: this.options, title: 'OVERVIEW BUTTON COLOR OPTIONS' },
  createHTML: function() {
    commonOptionGroup.createHTML.bind(this)(this.config);
  }
}

var progressColor = {
  options: [{ side: 'left', type: 'progressBackground', label: 'Background Color' }, { side: 'right', type: 'progressTextColor', label: 'Text Color' }],
  inputs: [],
  config: { options: this.options, title: 'PROGRESSBAR COLOR OPTIONS' },
  createHTML: function() {
    commonOptionGroup.createHTML.bind(this)(this.config);
  }
}

var headerOptions = {
  sizeOptionsLabel: ['Small', 'Medium', 'Large'],

  sizeOptions: [],

  createHTML: function() {
    this.container = createDomElement('div', { class: 'jfEmbed-section-area' });
    this.cardSizeTitle = createDomElement('h2', { class: 'jfEmbed-section-title' });
    this.cardSizeTitle.innerHTML = 'FORM TITLE OPTIONS';
    this.container.appendChild(this.cardSizeTitle);
    
    this.sizeContainer = createDomElement('div', { class: 'jfEmbed-section-content jfEnbed-buttonWrapper cf' });
    var option = createDomElement('button');
    this.sizeOptionsLabel.forEach(function(opt) {
      var clonedOption = option.cloneNode();
      if (opt === 'Medium') clonedOption.setAttribute('class', 'active');
      clonedOption.innerHTML = opt;
      clonedOption.setAttribute('data-value', opt.toLowerCase());
      this.sizeContainer.appendChild(clonedOption)
      this.sizeOptions.push({ ele: clonedOption, label: opt, value: opt.toLowerCase() });
    }.bind(this));

    this.clearfix2 = createDomElement('div', { class: 'cf' });
    this.left = createDomElement('div', { class: 'left' });
    this.selectColor = createDomElement('div', { class: 'selectColor' });
    this.headerColorInput = commonElements.colorInput();
    this.headerColorInput.setAttribute('data-type', 'headerText');
    this.headerColorText = createDomElement('div', { class: 'text' });
    this.headerColorText.appendChild(document.createTextNode('Form Title Color'));

    this.selectColor.appendChild(this.headerColorInput);
    this.left.appendChild(this.selectColor);
    this.left.appendChild(this.headerColorText);
    this.clearfix2.appendChild(this.left);

    this.container.appendChild(this.sizeContainer);
    // this.container.appendChild(this.clearfix2);
  }
};

var EmbedOptions = {
  init: function (formID, formStyle, developer, isSmartEmbed, el) {
    this.formID = formID;
    this.developer = developer;
    this.isSmartEmbed = isSmartEmbed === '1';

    this.formFrame = window.parent.document.querySelector('[id="' + this.formID + '"], [id="JotFormIFrame-' + this.formID + '"]');
    this.embedUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
    this.embedURLHash = this.getMD5(this.embedUrl);

    this.baseURL = 'https://www.jotform.com/';
    if (this.developer !== 'live') {
      this.baseURL = 'https://' +  this.developer + '.jotform.pro/';
    }

    this.formStyle = formStyle ? formStyle[this.embedURLHash] : {};
    this.registerMessageHandlers();
    if (this.formFrame && this.formFrame.contentWindow) {
      this.sendPostMessage({ showOwnerButton: true });
    }
  },

  registerMessageHandlers: function(e) {
    window.addEventListener('message', function(e) {
      try {
        var message = e.data.split(':');
        if (!message[0] || message[0] !== 'embedOptions') {
          return;
        }

        var action = message[1] || null;
        var params = message[2] || null;
        this.run(action, params);
      } catch (e) {
        console.log(e);
      }
    }.bind(this), false);
  },

  changedProps: {},

  cssPropMap: {
    nextButtonColor: 'buttonBgColor-next',
    prevButtonColor: 'buttonBgColor-prev',
    background: 'pageBg-colorBegin',
    cardColor: 'actions-bg',
    cardBorderColor: 'card-borderColor',
    overviewColor: 'progress-backgroundColor',
    overviewTextColor: 'progress-textColor',
    headerText: 'welcome-titleColor',
    toggleTitle: 'general-showFormTitle',
    toggleLogo: 'general-showFormIcon',
    toggleOverview: 'general-showProgressButton',
    toggleProgress: 'general-showProgressBar',
    toggleShadow: 'card-boxShadow'
  },

  elements: {
    header: header,
    tabs: tabs,
    frameSize: frameSize,
    formBackground: formBackground,
    fontFamily: fontFamily,
    formElements: formElements,
    actionButtons: actionButtons,
    cardColor: cardColor,
    buttonColor: buttonColor,
    overviewColor: overviewColor,
    progressColor: progressColor,
    headerOptions: headerOptions
  },

  embedContainer: {
    width: 372,
    height: 200
  },

  resizeParams: {
    width: 30,
    height: 30,
    padding: 10
  },

  initialize: function(formID) {
    this.createEmbedOptions(formID);
    this.formID = formID;
  },
  
  run: function(action, formID) {
    this.formID = formID;
    switch (action) {
    case 'show':
      this.showEmbedOptions(formID);
      break;
    case 'toggle':
      this.toggleEmbedOptions(formID);
    }
  },

  toggleEmbedOptions: function(formID) {
    var container = window.parent.document.getElementById('jotformEmbedOptions-' + formID);
    if (container) {
      if (container.style.display === 'none') {
        this.showEmbedOptions();
      } else {
        this.closeEmbedOptions();
      }
    } else {
      this.createEmbedOptions(formID);
    }
  },

  closeEmbedOptions: function() {
    this.embedOptionsContainer.style.display = 'none';
    this.resize.style.display = 'none';
  },

  showEmbedOptions: function(formID) {
    var formPosition = this.getInitialPosition();
    this.embedOptionsContainer.style.top=formPosition.top;
    this.embedOptionsContainer.style.left=formPosition.left;
    this.embedOptionsContainer.style.display = 'inline';
    this.resize.style.display = 'block';
  },

  createEmbedOptions: function (formID) {
    this.createContainers();
    this.initInputs();

    var initialPosition = this.getInitialPosition();

    this.embedOptionsContainer = createDomElement('div', { class: 'jfEmbed-container', id: 'jotformEmbedOptions-'+formID, style: 'z-index: 9999998; position: absolute; top:' + initialPosition.top + 'px; left:' + initialPosition.left + 'px;' });

    this.cssLink = createDomElement('link', { rel: 'stylesheet', type: 'text/css', href: 'https://www.jotform.com/js/embedOptions/embedOptions.css' });
    this.appendChildren = this.appendChildren.bind(this);
    this.cssLink.onload = this.appendChildren; // Create process continue in this function
    
    this.embedOptionsContainer.appendChild(this.cssLink); 
    window.parent.document.body.appendChild(this.embedOptionsContainer);
  },

  appendChildren: function() {
    this.designSection = createDomElement('section', { class: 'jfEmbed-options' });
    this.optionsSection = createDomElement('section', { class: 'jfEmbed-options js-section-2 hide' });

    this.designSection.appendChild(this.elements.headerOptions.container);
    this.designSection.appendChild(this.elements.frameSize.container);
    this.designSection.appendChild(this.elements.formBackground.container);
    this.designSection.appendChild(this.elements.cardColor.container);
    // this.designSection.appendChild(this.elements.buttonColor.container);
    this.designSection.appendChild(this.elements.overviewColor.container);

    this.optionsSection.appendChild(this.elements.formElements.container);

    this.feedbackFormContainer = createDomElement('div', { class: 'jfEmbed-section-title feedback-form-container' });
    // this.formScript = createDomElement('script', { src: 'https://form.jotform.com/static/feedback2.js', type: 'text/javascript' });
    this.feedbackFormButtonContainer = createDomElement('div', { class: 'feedback-form-button-container' });
    this.feedbackFormButtonContainer.innerText = 'Help us to improve';
    this.feedbackFormButtonContainer.addEventListener('click', function() {
      window.open('https://form.jotform.com/73113041123942', 'blank', 'scrollbars=yes, toolbar=no, width=700, height=500')
    });
    // this.feedbackFormContainer.appendChild(this.formScript);
    // this.feedbackFormButton = createDomElement('a', { class: 'lightbox-73113041123942', style: 'margin-top: 16px' });
    // this.feedbackFormButton.innerHTML = 'Help us to improve';
    
    // this.formScript.onload = function() {
    //   var JFL_73113041123942 = new window.parent.JotformFeedback({
    //     formId: '73113041123942',
    //     base: 'https://form.jotform.com/',
    //     windowTitle: '',
    //     background: 'rgba(255,255,255,0)',
    //     fontColor: '#FFFFFF',
    //     type: '1',
    //     height: 700,
    //     width: 700,
    //     openOnLoad: 0
    //   });
    // };

    // this.feedbackFormButton = createDomElement('a', { href: "javascript:void(window.open('https://form.jotform.com/73113041123942', 'blank', 'scrollbars=yes, toolbar=no, width=700, height=500'))", style: 'color: white; text-decoration: none; margin-top: 16px' });
    // this.feedbackFormButton.innerHTML = 'Help us to improve';

    // this.feedbackFormButtonContainer.appendChild(this.feedbackFormButton);
    this.feedbackFormContainer.appendChild(this.feedbackFormButtonContainer);

    this.embedOptionsContainer.appendChild(this.elements.header.container);
    this.embedOptionsContainer.appendChild(this.elements.tabs.container);
    this.embedOptionsContainer.appendChild(this.designSection);
    this.embedOptionsContainer.appendChild(this.optionsSection);

    this.embedOptionsContainer.appendChild(this.feedbackFormContainer);
    this.embedOptionsContainer.appendChild(this.elements.actionButtons.container);

    this.setResizeBox();
    this.createEventListeners();
    this.setInitialValues();
  },

  createEventListeners: function() {
    this.createMouseListeners();
    this.createGeneralListeners();
    this.createFrameSizeListeners();
    this.createColorChangeListeners();
    this.createFormElementsListener();
    this.createHeaderOptionsListener();
    this.createSmartEmbedListener();
  },

  createMouseListeners: function() {
    this.moveDragContainer = this.moveDragContainer.bind(this);
    this.resizeFrame = this.resizeFrame.bind(this);

    this.embedOptionsContainer.addEventListener('mousedown', function(e) {
      this.embedOptionsContainer.style.zIndex = 9999999;
      window.parent.document.body.addEventListener('mousemove', this.moveDragContainer, { passive: true })
      this.formFrame.style.pointerEvents = 'none';
    }.bind(this));
    this.resize.addEventListener('mousedown', function() {
      window.parent.document.body.addEventListener('mousemove', this.resizeFrame, { passive: true });
      this.formFrame.style.pointerEvents = 'none';
    }.bind(this));

    window.parent.document.addEventListener('mouseup', function(e) {
      this.embedOptionsContainer.style.zIndex = 9999998;
      window.parent.document.body.removeEventListener('mousemove', this.moveDragContainer)
      window.parent.document.body.removeEventListener('mousemove', this.resizeFrame)
      this.formFrame.style.pointerEvents = '';
    }.bind(this));
  },

  createGeneralListeners: function() {
    this.onClose = this.onClose.bind(this);
    this.onSave = this.onSave.bind(this);

    this.elements.actionButtons.cancelButton.addEventListener('click', this.onClose);
    this.elements.header.closeButton.addEventListener('click', this.onClose);
    this.elements.actionButtons.saveButton.addEventListener('click', this.onSave);

    this.elements.tabs.designTab.addEventListener('click', function() {
      this.designSection.classList.remove('hide');
      this.elements.tabs.designTab.classList.add('active');
      this.optionsSection.classList.add('hide');
      this.elements.tabs.optionTab.classList.remove('active');
    }.bind(this));
    this.elements.tabs.optionTab.addEventListener('click', function() {
      this.optionsSection.classList.remove('hide');
      this.elements.tabs.optionTab.classList.add('active');
      this.designSection.classList.add('hide');
      this.elements.tabs.designTab.classList.remove('active');
    }.bind(this));
  },

  createFrameSizeListeners: function() {
    this.changeFrameWidth = this.changeFrameWidth.bind(this);
    this.changeFrameHeight = this.changeFrameHeight.bind(this);
    this.resetFrameSizes = this.resetFrameSizes.bind(this);

    this.elements.frameSize.widthInput.addEventListener('change', this.changeFrameWidth);
    this.elements.frameSize.heightInput.addEventListener('change', this.changeFrameHeight);
    this.elements.frameSize.resetSizeButton.addEventListener('click', this.resetFrameSizes);
  },

  createColorChangeListeners: function() {
    this.changeBgColor = this.changeBgColor.bind(this);
    this.changeColorFromPicker = this.changeColorFromPicker.bind(this);

    this.elements.formBackground.colorElements.forEach(function(color) {
      color.ele.addEventListener('click', this.changeBgColor)
    }.bind(this));

    [
      this.elements.formBackground.colorInput,
      this.elements.headerOptions.headerColorInput,
      this.elements.cardColor.inputs,
      this.elements.buttonColor.inputs,
      this.elements.overviewColor.inputs,
      this.elements.progressColor.inputs
    ]
    .reduce(function(acc, curr){ return acc.concat(curr); }, [])
    .map(function(item) { return item.ele ? item.ele : item })
    .forEach(function(item) { item.addEventListener('change', this.changeColorFromPicker); }.bind(this));
  },

  createFormElementsListener: function() {
    this.elements.formElements.listItems.forEach(function(ele) {
      var input = ele.item.querySelector('input');
      input.addEventListener('change', function(e) {
        var checked = e.target.checked, display = 'none', message = {};
        var toggle = checked ? 'show' : 'hide';

        var type = ele.options.type;

        if (type === 'onlyCard') {
          this.toggleFormElements(!e.target.checked);
          // toggling the elements should trigger change separately. no need to continue.
          return;
        }

        if (type === 'toggleShadow') {
          display = checked ? '50px' : '0px';
        } else if (['toggleTitle', 'toggleLogo', 'toggleProgress', 'toggleOverview'].indexOf(type) > -1) {
          display = checked;
        } else {
          display = checked ? 'inline-block' : 'none';
        }

        var prop = this.cssPropMap[type];
        this.setChangedProps(prop, display);
        
        message[type] = toggle;
        this.sendPostMessage(message);
        this.setOnlyCardOption();
      }.bind(this));
    }.bind(this));
  },

  toggleFormElements: function(checked) {
    var options = Object.keys(this.layoutOptions).forEach(function(key) {
      this.layoutOptions[key].checked = checked;
      fireChangeEvent(this.layoutOptions[key]);
    }.bind(this));
  },

  createHeaderOptionsListener: function() {
    this.changeHeaderOption = this.changeHeaderOption.bind(this);

    this.elements.headerOptions.sizeOptions.forEach(function(option) {
      this.postMessage
      option.ele.addEventListener('click', this.changeHeaderOption);
    }.bind(this));   
  },

  createSmartEmbedListener: function() {
    var self = this;
    var smartEmbedToggle = this.elements.formElements.smartEmbedListContent.input;

    if(this.isSmartEmbed) {
      smartEmbedToggle.checked = true;
    }
  
    smartEmbedToggle.addEventListener('change', function() {
      self.setChangedProps('smartEmbed', this.checked ? '1' : '0');
    });
  },

  resizeFrame: function(e) {
    var dim = this.getFormDimension();

    this.setFrameSize('minWidth', parseInt(dim.width) + e.movementX);
    this.setFrameSize('height', parseInt(dim.height) + e.movementY);

    this.setChangedProps('embedWidth', parseInt(dim.width) + e.movementX);
    this.setChangedProps('embedHeight', parseInt(dim.height) + e.movementY);

    this.setResizePosition();
    this.setFrameSizeValues();
  },

  setInitialValues: function() {
    Object.keys(this.formStyle).forEach(function (key) {
      if(this.inputs[key]) {
        if (key === 'welcome-fontSize') {
          this.elements.headerOptions.sizeOptions[1].ele.setAttribute('class', '');
          if (this.formStyle[key] === '1em') {
            this.elements.headerOptions.sizeOptions[0].ele.setAttribute('class', 'active');
          }
          else if (this.formStyle[key] === '1.6em') {
            this.elements.headerOptions.sizeOptions[1].ele.setAttribute('class', 'active');
          } else {
            this.elements.headerOptions.sizeOptions[2].ele.setAttribute('class', 'active');
          }
        } else {
          this.inputs[key].value = this.formStyle[key];
        }
      }

      if (this.layoutOptions[key]) {
        this.layoutOptions[key].checked = ['none', 0, '0px', false].indexOf(this.formStyle[key]) < 0;
      }
    }.bind(this));

    var initalDimensions = this.getFormDimension();
    this.formStyle.formWidth = this.formStyle.embedWidth || Math.floor(initalDimensions.width);
    this.formStyle.formHeight = this.formStyle.embedHeight || Math.floor(initalDimensions.height);

    this.elements.frameSize.widthInput.value = this.formStyle.embedWidth || Math.floor(initalDimensions.width);
    this.elements.frameSize.heightInput.value = this.formStyle.embedHeight || Math.floor(initalDimensions.height);
    this.setOnlyCardOption();
  },

  setOnlyCardOption: function () {
    var options = Object.keys(this.layoutOptions).map(function(key) {
      return this.layoutOptions[key]
    }.bind(this))
    .filter(function(ele, i , arr) { return ele.checked });
    this.elements.formElements.listItems[0].ele.checked = options.length == 0;
  },

  getFormDimension: function() {
    var rect = this.formFrame.getBoundingClientRect();
    return { width: rect.width, height: rect.height };
  },

  getInitialPosition: function() {
    var formLeft = this.formFrame.offsetLeft;
    var formTop = this.formFrame.offsetTop;
    // var formRect = this.formFrame.getBoundingClientRect();
    // var scrollPos = document.documentElement.scrollTop;
    
    return {
      top: formTop,
      left: formLeft - this.embedContainer.width < 0 ? 0 : formLeft - this.embedContainer.width + 372
    };
  },

  setFrameSizeValues: function() {
    var formWH = this.getFormDimension();
    this.elements.frameSize.widthInput.value = Math.floor(formWH.width);
    this.elements.frameSize.heightInput.value = Math.floor(formWH.height);
  },

  setResizeBox: function() {
    this.resize = createDomElement('div', { class: 'jf-resize', style: 'position: absolute; width: ' + this.resizeParams.width + 'px; height: ' + this.resizeParams.height + 'px; background: url(https://cl.ly/09220g24173q/download/asd.svg) no-repeat; width: 30px; height: 30px; background-size: 100%; cursor: -webkit-grab;' });
    this.formFrame.parentNode.insertBefore(this.resize, this.formFrame.nextSibling);
    this.setResizePosition();
  },

  setResizePosition: function() {
    var dim = this.formFrame.getBoundingClientRect();
    var top = this.formFrame.offsetTop;
    var left = this.formFrame.offsetLeft;

    this.resize.style.top = (dim.height + top - this.resizeParams.height - this.resizeParams.padding) + 'px';
    this.resize.style.left = (dim.width + left - this.resizeParams.width - this.resizeParams.padding) + 'px';
  },

  setChangedProps: function(prop, value) {
    if (Object.keys(this.changedProps).length == 0) {
      this.elements.actionButtons.saveButton.innerHTML = 'SAVE';
    }

    this.changedProps[prop] = value;
  },

  onClose: function(e) {
    this.closeEmbedOptions();
  },

  onSave: function(e) {
    if (Object.keys(this.changedProps).length > 0) {
      this.elements.actionButtons.saveButton.innerHTML = 'SAVING ...';
      this.saveEmbedOptions();
    }
  },

  changeBgColor: function(e) {
    var targetColor = e.target.getAttribute('data-value');
    this.elements.formBackground.colorInput.value = targetColor;

    fireChangeEvent(this.elements.formBackground.colorInput);
  },

  changeColorFromPicker: function(e) {
    var message = {};
    message[e.target.getAttribute('data-type')] = e.target.value;
    var prop = this.cssPropMap[e.target.getAttribute('data-type')];

    this.setChangedProps(prop, e.target.value);
    
    if (e.target.getAttribute('data-type') == 'background') {
      this.setChangedProps('pageBg-colorEnd', e.target.value);
      this.setChangedProps('pageBg-image', '');
    }

    this.sendPostMessage(message);
  },

  changeOpacity: function(e) {
    this.sendPostMessage({ backgroundOpacity: parseInt(e.target.value) });
  },

  changeFrameWidth: function(e) {
    this.setFrameSize('minWidth', e.target.value);
    this.setChangedProps('embedWidth', parseInt(e.target.value, 10));
    
    this.setResizePosition();
  },

  changeFrameHeight: function(e) {
    this.setFrameSize('height', e.target.value);
    this.setChangedProps('embedHeight', parseInt(e.target.value, 10));
    
    this.setResizePosition();
  },

  setFrameSize: function(type, value) {
    this.formFrame.style[type] = value + 'px';
  },

  resetFrameSizes: function() {
    if (!this.formStyle) return;

    this.formFrame.style.minWidth = this.formStyle.formWidth + 'px';
    this.formFrame.style.height = this.formStyle.formHeight + 'px';

    this.setResizePosition();

    this.setFrameSizeValues();
  },

  changeHeaderOption: function(e) {

    var type = e.target.getAttribute('data-value');
    var titleSize = '1em';
    if (type === 'medium') {
      titleSize = '1.6em';
    } else if (type === 'large') {
      titleSize = '2em';
    }
    
    var message = { headerSize: titleSize };
    this.setChangedProps('welcome-fontSize', titleSize);

    this.elements.headerOptions.sizeOptions.forEach(function(opt) {
      opt.ele.setAttribute('class', '');
    });

    e.target.setAttribute('class', 'active');
    this.sendPostMessage(message);
  },

  moveDragContainer: function(e) {
    this.embedOptionsContainer.style.top = (parseInt(this.embedOptionsContainer.style.top) + e.movementY) + 'px'; 
    this.embedOptionsContainer.style.left = (parseInt(this.embedOptionsContainer.style.left) + e.movementX) + 'px';
  },

  createContainers: function() {
    Object.keys(this.elements).forEach(function(key) {
      try {
        this.elements[key].createHTML();
      } catch (e) {console.warn(e)}
    }.bind(this))
  },

  initInputs: function() {
    this.inputs = {
      // 'button-borderRadius': null, 
      'buttonBgColor-next': this.elements.buttonColor.inputs[0].ele,
      'buttonBgColor-prev': this.elements.buttonColor.inputs[1].ele,
      'buttonBgColor-success': null,
      // 'card-borderRadius': null,
      // 'font-imports': null,
      // 'font-pri': null,
      // 'input-borderRadius': null,
      'pageBg-colorBegin': this.elements.formBackground.colorInput,
      'pageBg-colorEnd': null,
      'actions-bg': this.elements.cardColor.inputs[0].ele,
      'card-borderColor': this.elements.cardColor.inputs[1].ele,
      'progress-backgroundColor': this.elements.overviewColor.inputs[0].ele,
      'progress-textColor': this.elements.overviewColor.inputs[1].ele,
      'welcome-fontSize': this.elements.headerOptions.sizeOptions,
      'welcome-titleColor': this.elements.headerOptions.headerColorInput,
    };

    this.layoutOptions = {
      'general-showFormTitle': this.elements.formElements.listItems[1].ele,
      'general-showFormIcon': this.elements.formElements.listItems[2].ele,
      'general-showProgressBar': this.elements.formElements.listItems[3].ele,
      'general-showProgressButton': this.elements.formElements.listItems[4].ele,
      'card-boxShadow': this.elements.formElements.listItems[5].ele,
    }
  },

  sendPostMessage: function(message) {
    this.formFrame.contentWindow.postMessage(JSON.stringify(message), '*');
  },

  saveEmbedOptions: function(smartEmbed) {
    var reqURL = this.baseURL + 'stylebuilder/' + this.formID + '.css?inlineEmbedEnabled=1&save=1&action=fastcss&embedUrl=' + this.embedUrl;
    var params = 'params=' + JSON.stringify(this.changedProps);
    this.changedProps = {};
    this.sendSaveRequest(reqURL, params);
  },

  sendSaveRequest: function(url, params, type) {
    var http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {
      if (http.readyState == 4 && http.status == 200) {
        if (type === 'props') {
          this.changedProps = {};
        }
      }
    }.bind(this)
    http.send(params);
    setTimeout(function() {
      this.elements.actionButtons.saveButton.innerHTML = 'SAVED!';
    }.bind(this), 200);
  },

  getMD5: function(s) { function L(k,d){return(k<<d)|(k>>>(32-d))}function K(G,k){var I,d,F,H,x;F=(G&2147483648);H=(k&2147483648);I=(G&1073741824);d=(k&1073741824);x=(G&1073741823)+(k&1073741823);if(I&d){return(x^2147483648^F^H)}if(I|d){if(x&1073741824){return(x^3221225472^F^H)}else{return(x^1073741824^F^H)}}else{return(x^F^H)}}function r(d,F,k){return(d&F)|((~d)&k)}function q(d,F,k){return(d&k)|(F&(~k))}function p(d,F,k){return(d^F^k)}function n(d,F,k){return(F^(d|(~k)))}function u(G,F,aa,Z,k,H,I){G=K(G,K(K(r(F,aa,Z),k),I));return K(L(G,H),F)}function f(G,F,aa,Z,k,H,I){G=K(G,K(K(q(F,aa,Z),k),I));return K(L(G,H),F)}function D(G,F,aa,Z,k,H,I){G=K(G,K(K(p(F,aa,Z),k),I));return K(L(G,H),F)}function t(G,F,aa,Z,k,H,I){G=K(G,K(K(n(F,aa,Z),k),I));return K(L(G,H),F)}function e(G){var Z;var F=G.length;var x=F+8;var k=(x-(x%64))/64;var I=(k+1)*16;var aa=Array(I-1);var d=0;var H=0;while(H<F){Z=(H-(H%4))/4;d=(H%4)*8;aa[Z]=(aa[Z]| (G.charCodeAt(H)<<d));H++}Z=(H-(H%4))/4;d=(H%4)*8;aa[Z]=aa[Z]|(128<<d);aa[I-2]=F<<3;aa[I-1]=F>>>29;return aa}function B(x){var k="",F="",G,d;for(d=0;d<=3;d++){G=(x>>>(d*8))&255;F="0"+G.toString(16);k=k+F.substr(F.length-2,2)}return k}function J(k){k=k.replace(/rn/g,"n");var d="";for(var F=0;F<k.length;F++){var x=k.charCodeAt(F);if(x<128){d+=String.fromCharCode(x)}else{if((x>127)&&(x<2048)){d+=String.fromCharCode((x>>6)|192);d+=String.fromCharCode((x&63)|128)}else{d+=String.fromCharCode((x>>12)|224);d+=String.fromCharCode(((x>>6)&63)|128);d+=String.fromCharCode((x&63)|128)}}}return d}var C=Array();var P,h,E,v,g,Y,X,W,V;var S=7,Q=12,N=17,M=22;var A=5,z=9,y=14,w=20;var o=4,m=11,l=16,j=23;var U=6,T=10,R=15,O=21;s=J(s);C=e(s);Y=1732584193;X=4023233417;W=2562383102;V=271733878;for(P=0;P<C.length;P+=16){h=Y;E=X;v=W;g=V;Y=u(Y,X,W,V,C[P+0],S,3614090360);V=u(V,Y,X,W,C[P+1],Q,3905402710);W=u(W,V,Y,X,C[P+2],N,606105819);X=u(X,W,V,Y,C[P+3],M,3250441966);Y=u(Y,X,W,V,C[P+4],S,4118548399);V=u(V,Y,X,W,C[P+5],Q,1200080426);W=u(W,V,Y,X,C[P+6],N,2821735955);X=u(X,W,V,Y,C[P+7],M,4249261313);Y=u(Y,X,W,V,C[P+8],S,1770035416);V=u(V,Y,X,W,C[P+9],Q,2336552879);W=u(W,V,Y,X,C[P+10],N,4294925233);X=u(X,W,V,Y,C[P+11],M,2304563134);Y=u(Y,X,W,V,C[P+12],S,1804603682);V=u(V,Y,X,W,C[P+13],Q,4254626195);W=u(W,V,Y,X,C[P+14],N,2792965006);X=u(X,W,V,Y,C[P+15],M,1236535329);Y=f(Y,X,W,V,C[P+1],A,4129170786);V=f(V,Y,X,W,C[P+6],z,3225465664);W=f(W,V,Y,X,C[P+11],y,643717713);X=f(X,W,V,Y,C[P+0],w,3921069994);Y=f(Y,X,W,V,C[P+5],A,3593408605);V=f(V,Y,X,W,C[P+10],z,38016083);W=f(W,V,Y,X,C[P+15],y,3634488961);X=f(X,W,V,Y,C[P+4],w,3889429448);Y=f(Y,X,W,V,C[P+9],A,568446438);V=f(V,Y,X,W,C[P+14],z,3275163606);W=f(W,V,Y,X,C[P+3],y,4107603335);X=f(X,W,V,Y,C[P+8],w,1163531501);Y=f(Y,X,W,V,C[P+13],A,2850285829);V=f(V,Y,X,W,C[P+2],z,4243563512);W=f(W,V,Y,X,C[P+7],y,1735328473);X=f(X,W,V,Y,C[P+12],w,2368359562);Y=D(Y,X,W,V,C[P+5],o,4294588738);V=D(V,Y,X,W,C[P+8],m,2272392833);W=D(W,V,Y,X,C[P+11],l,1839030562);X=D(X,W,V,Y,C[P+14],j,4259657740);Y=D(Y,X,W,V,C[P+1],o,2763975236);V=D(V,Y,X,W,C[P+4],m,1272893353);W=D(W,V,Y,X,C[P+7],l,4139469664);X=D(X,W,V,Y,C[P+10],j,3200236656);Y=D(Y,X,W,V,C[P+13],o,681279174);V=D(V,Y,X,W,C[P+0],m,3936430074);W=D(W,V,Y,X,C[P+3],l,3572445317);X=D(X,W,V,Y,C[P+6],j,76029189);Y=D(Y,X,W,V,C[P+9],o,3654602809);V=D(V,Y,X,W,C[P+12],m,3873151461);W=D(W,V,Y,X,C[P+15],l,530742520);X=D(X,W,V,Y,C[P+2],j,3299628645);Y=t(Y,X,W,V,C[P+0],U,4096336452);V=t(V,Y,X,W,C[P+7],T,1126891415);W=t(W,V,Y,X,C[P+14],R,2878612391);X=t(X,W,V,Y,C[P+5],O,4237533241);Y=t(Y,X,W,V,C[P+12],U,1700485571);V=t(V,Y,X,W,C[P+3],T,2399980690);W=t(W,V,Y,X,C[P+10],R,4293915773);X=t(X,W,V,Y,C[P+1],O,2240044497);Y=t(Y,X,W,V,C[P+8],U,1873313359);V=t(V,Y,X,W,C[P+15],T,4264355552);W=t(W,V,Y,X,C[P+6],R,2734768916);X=t(X,W,V,Y,C[P+13],O,1309151649);Y=t(Y,X,W,V,C[P+4],U,4149444226);V=t(V,Y,X,W,C[P+11],T,3174756917);W=t(W,V,Y,X,C[P+2],R,718787259);X=t(X,W,V,Y,C[P+9],O,3951481745);Y=K(Y,h);X=K(X,E);W=K(W,v);V=K(V,g)}var i=B(Y)+B(X)+B(W)+B(V);return i.toLowerCase()}
}

function createDomElement(name, attrs) {
  var el = document.createElement(name.toString());

  !!attrs && Object.keys(attrs).forEach(function(key) {
    el.setAttribute(key, attrs[key]);
  });

  return el;
}

function fireChangeEvent(selectElement) {
  var changeEvent = document.createEvent('HTMLEvents');

  changeEvent.initEvent('change', true, true);
  selectElement.dispatchEvent(changeEvent);
}EmbedOptions.init(91223984758368, null, 'live', '1');