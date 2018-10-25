import Header from "./components/header"
import Footer from "./components/footer"

class AppContainer extends React.Component {
	constructor(props) {
		super(props);
	}
	render() {
		return (
			<div>
				<Header />
				<div className="content">
					{this.props.children}
				</div>
				<Footer />
			</div>
		);
	}
}

export default AppContainer