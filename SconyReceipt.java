
import pl.poznan.put.cs.ify.api.YFeatureList;
import pl.poznan.put.cs.ify.api.YFeature;
import pl.poznan.put.cs.ify.api.YReceipt;
import pl.poznan.put.cs.ify.api.params.YParamList;
import android.os.Bundle;


public class SconyReceipt extends YReceipt {

	@Override
	public void requestFeatures(YFeatureList features) {
		// TODO Add needed YFeatures like:
		// feats.add(new YBatteryFeature());
	}

	@Override
	public void requestParams(YParamList params) {
		// TODO Add needed YParams with default values like:
		// params.add("Name", Type.String, "John");
	}
	
	@Override
    public void handleData(YFeature feature, Bundle data) {
		//
	}

	@Override
	public String getName() {
		//Generated code, don't change.
		return "SconyReceipt";
	}

	@Override
	public YReceipt newInstance() {
		//Generated code, don't change.
		return new SconyReceipt();
	}
}
