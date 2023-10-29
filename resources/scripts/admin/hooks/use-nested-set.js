import { useEffect, useRef } from 'react';

export const useNestedSet = (onChange) => {
  const ref = useRef(null);

  const handleDocumentClick = (evt) => {
    if (evt.target.classList.contains('nested-list__draggable')) {
      evt.target.closest('.nested-list__item').classList.toggle('nested-list__item--expanded');
    }
  };

  useEffect(() => {
    if (ref.current) {
      $('.nested-list').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div',
        excludeRoot: true,
        maxLevels: 2,
        isTree: true,
        startCollapsed: false,
        branchClass: 'nested-list__item--branch',
        expandedClass: 'nested-list__item--expanded',
        leafClass: 'nested-list__item--leaf',
        hoveringClass: 'nested-list__item--hover',
        relocate: () => {
          const hierarchy = [];
          document.querySelectorAll('.nested-list>li').forEach((item) => {
            const category = JSON.parse(item.dataset.item);

            item.querySelectorAll('li')?.forEach((child, index) => {
              const categoryChild = JSON.parse(child.dataset.item);
              if (index === 0) {
                category.children = [categoryChild];
              } else {
                category.children.push(categoryChild);
              }
            });

            hierarchy.push(category);
          });
          onChange(hierarchy);
        },
      });
    }

    document.addEventListener('click', handleDocumentClick);

    return () => {
      document.removeEventListener('click', handleDocumentClick);
    };
  }, [onChange]);

  return ref;
};
