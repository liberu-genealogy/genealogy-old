const type = "website";
const url = "https://www.familytree365.com";
const title = "Family Tree 365 - Start your family tree today - free! Your first tree is 100% free. Sign-up to begin your genealogy journey today!";
const description =
  "Our user-friendly yet powerful platform lets you create your own family tree the quick and easy way. No technical knowledge is required. Start your family tree today - free!";
const mainImage = "https://www.familytree365.com/images/thumbnail.png";

export default (meta) => {
  return [
  {
    hid: "description",
    name: "description",
    content: (meta && meta.description) || description,
  },
  {
      hid: "title",
      property: "title",
      content: (meta && meta.title) || title,
  },
  {
    hid: "og:type",
    property: "og:type",
    content: (meta && meta.type) || type,
  },
  {
    hid: "og:url",
    property: "og:url",
    content: (meta && meta.url) || url,
  },
  {
    hid: "og:title",
    property: "og:title",
    content: (meta && meta.title) || title,
  },
  {
    hid: "og:description",
    property: "og:description",
    content: (meta && meta.description) || description,
  },
  {
    hid: "og:image",
    property: "og:image",
    content: (meta && meta.mainImage) || mainImage,
  },
  {
    hid: "twitter:url",
    name: "twitter:url",
    content: (meta && meta.url) || url,
  },
  {
    hid: "twitter:title",
    name: "twitter:title",
    content: (meta && meta.title) || title,
  },
  {
    hid: "twitter:description",
    name: "twitter:description",
    content: (meta && meta.description) || description,
  },
  {
    hid: "twitter:image",
    name: "twitter:image",
    content: (meta && meta.mainImage) || mainImage,
  },
];
};
