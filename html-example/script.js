document.addEventListener("DOMContentLoaded", function () {
  // Função para adicionar tags ao redor dos elementos
  document
    .getElementById("show-tags-btn")
    .addEventListener("click", function () {
      const body = document.getElementById("page-body");

      function wrapElements(element) {
        if (element.nodeType === Node.ELEMENT_NODE) {
          const tagName = element.tagName.toLowerCase();

          // Criar um elemento span para mostrar a tag
          const wrapper = document.createElement("span");
          wrapper.className = "highlighted-tag";
          wrapper.setAttribute("data-tag", `<${tagName}>`);

          // Adicionar classes especiais para diferentes tags
          if (tagName === "section") {
            wrapper.classList.add("highlighted-tag-section");
          } else if (tagName === "div") {
            wrapper.classList.add("highlighted-tag-div");
          } else if (tagName === "header") {
            wrapper.classList.add("highlighted-tag-header");
          }

          // Mover o elemento original para dentro do wrapper
          element.parentNode.insertBefore(wrapper, element);
          wrapper.appendChild(element);

          // Recursivamente envolver elementos filhos
          Array.from(element.children).forEach(wrapElements);
        }
      }

      wrapElements(body);
    });

  // Função para remover tags e restaurar o DOM
  function removeTags(element) {
    // Remove todas as tags de destaque dentro do elemento
    const tags = Array.from(element.querySelectorAll(".highlighted-tag"));
    tags.forEach((tag) => {
      // Substituir o wrapper pelo conteúdo
      const childNodes = Array.from(tag.childNodes);
      tag.replaceWith(...childNodes);
    });

    // Recursivamente remover tags dos elementos filhos
    Array.from(element.children).forEach(removeTags);
  }

  // Adicionar o listener para o botão de remover tags
  document
    .getElementById("remove-tags-btn")
    .addEventListener("click", function () {
      const body = document.getElementById("page-body");
      removeTags(body);
    });
});
