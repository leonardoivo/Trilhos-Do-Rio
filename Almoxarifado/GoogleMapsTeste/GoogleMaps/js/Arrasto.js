var dragSrcEl = null;

function handleDragStart(e) {
	this.style.opacity = '0.4'; // this / e.target é o nó fonte

	dragSrcEl = this;

	e.dataTransfer.effectAllowed = 'move';
	e.dataTransfer.setData('text/html', this.innerHTML);
};

function handleDragOver(e) {
	if(e.preventDefault) {
		e.preventDefault(); // Necessário. permite nos soltar
	}

	e.dataTransfer.dropEffect('move'); // veja a seção no objeto DataTransfer
	return false;
};

function handleDragEnter(e) {
	this.classList.add('over');
};

function handleDragLeave(e) {
	this.classList.remove('over');
};

function handleDrop(e) {
	if(e.stopPropagation) {
		e.stopPropagation();
	}
	// Don't do anything if dropping the same column we're dragging.
  if (dragSrcEl != this) {
    // Set the source column's HTML to the HTML of the columnwe dropped on.
    dragSrcEl.innerHTML = this.innerHTML;
    this.innerHTML = e.dataTransfer.getData('text/html');
  }

  return false;
};

function handleDragEnd(e) {
	[].forEach.call(cols, function(col) {
		col.classList.remove('over');
	});
	this.style.opacity = '1';
};

var cols = document.querySelectorAll('#columns .column');

[].forEach.call(cols, function(col) {
	col.addEventListener('dragstart', handleDragStart, false);
	col.addEventListener('dragenter', handleDragEnter, false);
	col.addEventListener('dragover', handleDragOver, false);
	col.addEventListener('dragleave', handleDragLeave, false);
	col.addEventListener('drop', handleDrop, false);
	col.addEventListener('dragend', handleDragEnd, false);
});
