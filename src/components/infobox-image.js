const placeHolder = PreinfoboxBlocksettings.defaultSrcImg;

const { Component } = wp.element;

export default class InfoBoxImage extends Component {
  render() {
    return  <img src={placeHolder} alt="fd-Infobox-alt" />;
  }
}
