export default function getElementsForAnimation(container, selector) {
  if (Array.isArray(container)) {
    return container.map(el => {
      const a = Array.from(el.querySelectorAll(selector));
      if (el.matches(selector)) a.unshift(el);
      return a;
    }).flat();
  }
  return container.querySelectorAll(selector);
}