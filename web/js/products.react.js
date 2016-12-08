/**
 * Created by m.dykhalkin on 06.12.2016.
 */
var ProductSection = React.createClass({

    getInitialState: function () {
        return {
            products: []
        }
    },

    componentDidMount: function () {
        this.loadProductsFromServer();
        setInterval(this.loadProductsFromServer, 2000);
    },

    loadProductsFromServer: function () {
        $.ajax({
            url: this.props.url,
            success: function (data) {
                this.setState({products: data.products});
            }.bind(this)
        });
    },

    render: function() {
        return (
            <div>
                <div className="products-container">
                    <h2 className="products-header">Products</h2>
                </div>
                <ProductList products={this.state.products} />
            </div>
        );
    }
});

var ProductList = React.createClass({

    render: function() {
        var productNodes = this.props.products.map(function(product) {
            return (
                <ProductBox key={product.id} category={product.category} vendor={product.vendor} model={product.model} color={product.color} price={product.price} uri={product.uri}/>
            );
        });

        return (
            <section>
                {productNodes}
            </section>
        );
    }

});

var ProductBox = React.createClass({

    render: function () {
        return (
            <div className="col-6 col-sm-6 col-lg-4">
                <h3 className="product-title">{this.props.model} {this.props.color}</h3>
                <div>
                    <img className="image-min" src={this.props.uri} alt=""/>
                    <h4 className="product-price">{this.props.price} руб.</h4>
                    <p><a className="btn btn-default" href="/product/iphone-6s" role="button">Купить »</a></p>
                </div>
            </div>
        );
    }

});

window.ProductSection = ProductSection;