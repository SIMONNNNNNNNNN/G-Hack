import AppContainer from "../AppContainer"

class Welcome extends React.Component {
	constructor(props) {
		super(props);
	}
	render() {
		return (
			< AppContainer>
				<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>
				<p>{this.props.message}</p>
                <p>If you would like to edit this page you'll find it located at:</p>
                <code>assets/js/react/components/welcome.js</code>

                <p>The corresponding controller for this page is found at:</p>
                <code>application/controllers/Welcome.php</code>

                <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
			</AppContainer>		
		);
	}
}

export default Welcome